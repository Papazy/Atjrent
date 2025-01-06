<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SewaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('rolemenucek');
    }
    public function index(Request $request)
{
    // Default query
    $query = Rent::with('user');

    // Default waktu mulai dan akhir
    $waktu_mulai = Rent::min('tanggal_mulai');
    $waktu_akhir = Rent::max('tanggal_mulai');
    $paid_only = 'off';

    // Filter berdasarkan waktu
    if ($request->filled(['waktu_mulai', 'waktu_akhir'])) {
        $request->validate([
            'waktu_mulai' => 'required|date',
            'waktu_akhir' => 'required|date|after_or_equal:waktu_mulai',
        ]);

        // Pastikan waktu lengkap untuk rentang
        $start_date = Carbon::parse($request->waktu_mulai)->startOfDay(); // 00:00:00
        $end_date = Carbon::parse($request->waktu_akhir)->endOfDay();     // 23:59:59

        $query->whereBetween('tanggal_mulai', [$start_date, $end_date]);

        $waktu_mulai = $start_date->toDateString();
        $waktu_akhir = $end_date->toDateString();
    }

    // Filter hanya transaksi yang selesai (Terbayar, Dikirim, Dikembalikan)
    if ($request->has('paid_only') && $request->paid_only == 'on') {
        $paid_only = 'on';
        $query->whereIn('status', ['terbayar', 'dikirim', 'dikembalikan']);
    }

    $rents = $query->latest()->get();

    return view('transaksi.sewa', compact('rents', 'waktu_mulai', 'waktu_akhir', 'paid_only'));
}

    public function detail($id)
    {
        $rent = Rent::with(['user','details'])->findOrFail($id);
        // var_dump($rent->barangs[0]->nama);
        // dd($rent->details[0]->barang);
        return view('transaksi.detailSewa', compact('rent'));
    }

    public function updateStatus($id, $status)
    {
        $rent = Rent::findOrFail($id);
        $rent->status = $status;
        $rent->save();

        if($status == 'dikembalikan'){
            foreach ($rent->details as $detail) {
                $detail->barang->stok_barang += $detail->stok_barang;
                $detail->barang->save();
            }
        }else if($status == 'terbayar'){
            foreach ($rent->details as $detail) {
                $detail->barang->stok_barang -= $detail->stok_barang;
                $detail->barang->save();
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Status berhasil diperbarui',
            'status' => $status
        ], 200);
    }


    }
