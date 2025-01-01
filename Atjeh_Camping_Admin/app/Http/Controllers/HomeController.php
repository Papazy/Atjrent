<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jual;
use App\Models\Rent;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();

        $widget = [
            'users' => $users,
        ];

        // Mendapatkan Jumlah Seluruh Barang
        $totalBarang = Barang::count();

        // Mendapatkan Jumlah Seluruh Barang Sewa
        $totalBarangSewa = Barang::where('is_jual', 'Sewa')->count();
        // Mendapatkan Jumlah Seluruh Barang Jual
        $totalBarangJual = Barang::where('is_jual', 'jual')->count();

        // Mendapatkan Jumlah Seluruh Rent dengan status Terbayar atau Dikembalikan
        $totalRentTerbayar = Rent::where('status', 'terbayar')->count();
        $totalRentDikembalikan = Rent::where('status', 'dikembalikan')->count();
        $totalRent= $totalRentTerbayar + $totalRentDikembalikan;

        // Mendapatkan Jumlah Seluruh Jual dengan status Terbayar
        $totalJual = Jual::where('status', 'terbayar')->count();


        // Mendapatkan Data Barang, berupa nama, stok dan is_jual
        $barangs = Barang::select('nama', 'stok_barang', 'is_jual')->get();

        // Mendapatkan Data Transaksi Jual semua data
        $jual = Jual::where('status', 'terbayar')->get();
        // Mendapatkan Data Transaksi Rent dengan status Terbayar atau Dikembalikan
        $rent = Rent::where('status', 'terbayar')->orWhere('status', 'dikembalikan')->get();

        // Mendapatkan Semua Pengguna yang roles_id bukan 1
        $users = User::where('roles_id', '!=', 1)->get();

        // mendapatkan total usernya
        $totalUser = $users->count();
        // Menggabungkan semua data Jual dan Rent menjadi atribut : user, created_at, transaksi (sewa atau jual), status
        $transaksi = $jual->merge($rent)->sortByDesc('created_at');



        return view('home', compact('widget', 'totalBarang', 'totalBarangSewa', 'totalBarangJual', 'totalRent', 'totalJual', 'barangs', 'transaksi', 'totalUser'));
    }
}
