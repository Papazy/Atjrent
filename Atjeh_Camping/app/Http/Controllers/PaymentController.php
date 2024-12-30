<?php

namespace App\Http\Controllers;

use App\Models\Jual;
use App\Models\Rent;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }

    public function processPayment(Request $request, $tipeTransaksi, $amount)
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // User
        $user = Auth::user();
        // Buat transaksi
        $params = [
            'transaction_details' => [
                'order_id' => rand(),
                'gross_amount' => $amount,
                'tipeTransaksi' => $tipeTransaksi,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'last_name' => '',
                'email' => $user->email,
                'phone' => $user->no_hp,
            ],
        ];





        try {
            $snapToken = Snap::getSnapToken($params);
            if($tipeTransaksi == 'sewa'){
                // handle image
                // dd($request->all());
                $image = $request->image;

                $response = Http::attach(
                    'image',
                    file_get_contents($image),
                    $image->getClientOriginalName()
                    )->post(env('APP_API') . "upload-ktp", [
                        'rent_id' => $request->rent_id,
                    ]);

                    if($response->successful()){
                        // get image url
                        // $imageUrl = $response->json()['path'];
                    }else{
                        // throw error
                        dd($response);
                        return;
                        throw new \Exception('Failed to upload image');
                    }

                $rent = Rent::where('id', $request->rent_id)->first();
                $rent->status = 'Terbayar';
                $rent->snap_token = $snapToken;
                $rent->save();

            }else{
                $jual = Jual::where('id', $request->rent_id)->first();
                $jual->status = 'Diproses';
                $jual->snap_token = $snapToken;
                $jual->save();
            }

            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            dd($e->getMessage());
            echo "console.log('Error occured:',". $e->getMessage().");";
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
