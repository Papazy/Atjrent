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

        $barangTidakCukup = collect();
        try {
            $snapToken = Snap::getSnapToken($params);
            if($tipeTransaksi == 'sewa'){

                $rent = Rent::where('id', $request->rent_id)->first();

                foreach($rent->details as $detail){
                    if($detail->barang->stok_barang < $detail->stok_barang){
                        $barangTidakCukup->push([
                            'nama' => $detail->barang->nama,
                            'stok_tersedia' => $detail->barang->stok_barang,
                            'stok_dibutuhkan' => $detail->stok_barang
                        ]);
                    }
                }
                if($barangTidakCukup->count() > 0){
                    throw new \Exception('Stok barang tidak mencukupi');
                }

            }else{
                $jual = Jual::where('id', $request->rent_id)->first();

                if($jual->barang->stok_barang < $jual->stok_barang){
                    $barangTidakCukup->push([
                        'nama' => $jual->barang->nama,
                        'stok_tersedia' => $jual->barang->stok_barang,
                        'stok_dibutuhkan' => $jual->stok_barang
                    ]);
                    throw new \Exception('Stok barang tidak mencukupi');
                }
            }

            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'barangTidakCukup' => $barangTidakCukup]);
        }
    }

    public function confirmPayment(Request $request, $tipeTransaksi, $id)
    {
        try {
            if($tipeTransaksi == 'rent'){
                $rent = Rent::where('id', $id)->first();


                $image = $request->image;

                $response = Http::attach(
                    'image',
                    file_get_contents($image),
                    $image->getClientOriginalName()
                    )->post(env('APP_API') . "upload-ktp", [
                        'rent_id' => $request->rent_id,
                    ]);

                    if($response->successful()){
                    }else{
                        // throw error
                        dd($response);
                        return;
                        throw new \Exception('Failed to upload image');
                    }

                $rent->status = 'terbayar';
                $rent->snap_token = $request->snap_token;
                $rent->ongkir = $request->ongkir;
                $rent->lokasi_pengambilan = $request->lokasi_pengambilan;

                $rent->save();

                foreach($rent->details as $detail){
                    $detail->barang->stok_barang -= $detail->stok_barang;
                    $detail->barang->save();
                }
            }else{
                $jual = Jual::where('id', $id)->first();
                $jual->status = 'terbayar';
                $jual->snap_token = $request->snap_token;
                $jual->ongkir = $request->ongkir;
                $jual->lokasi_pengambilan = $request->lokasi_pengambilan;
                
                $jual->save();
                $jual->barang->stok_barang -= $jual->stok_barang;
                $jual->barang->save();

            }

            return response()->json(['status' => 'success', 'message' => 'Pembayaran berhasil']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
