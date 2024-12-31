<?php

namespace App\Http\Controllers;
use App\Models\Barang;

class WelcomeController extends Controller
{
    public function index()
    {
        // Ambil semua data dari tabel barang
        $barangSewa = Barang::where('is_jual', 'Sewa')->latest()->get();
        $barangJual = Barang::where('is_jual', 'Jual')->latest()->get();

        return view('welcome', compact('barangSewa', 'barangJual'));
    }

    // Fungsi untuk mengambil datawelcome dengan format JSON (opsional, jika diperlukan AJAX)
    public function fetchBarang()
    {
        $datawelcome = Barang::all(); // Ambil datawelcome dari tabel barang
        return response()->json(['datawelcome' => $datawelcome], 200); // Kirimkan data sebagai JSON
    }
}
