<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SewaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('rolemenucek');
    }
    public function index()
    {
        $rents = Rent::with('user')->get();
        // var_dump($rents[1]->user->name);
        return view('transaksi.sewa', compact('rents'));
    }

    public function detail($id)
    {
        $rent = Rent::with(['user','details', 'barangs'])->findOrFail($id);
        // var_dump($rent->barangs[0]->nama);

        return view('transaksi.detailSewa', compact('rent'));
    }

    public function updateStatus($id, $status)
    {
        $rent = Rent::findOrFail($id);
        $rent->status = $status;
        $rent->save();

        return response()->json([
            'success' => true,
            'message' => 'Status berhasil diperbarui',
            'status' => $status
        ], 200);
    }


    }
