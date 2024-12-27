<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }

    public function processPayment(Request $request, $amount)
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Buat transaksi
        $params = [
            'transaction_details' => [
                'order_id' => rand(),
                'gross_amount' => $amount,
            ],
            'customer_details' => [
                'first_name' => 'Budi',
                'last_name' => 'Susanto',
                'email' => 'budi@example.com',
                'phone' => '08123456789',
            ],
        ];

        $rent = Rent::where('id', $request->rent_id)->first();
        $rent->status = 'Terbayar';
        $rent->save();

        try {
            $snapToken = Snap::getSnapToken($params);
            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
