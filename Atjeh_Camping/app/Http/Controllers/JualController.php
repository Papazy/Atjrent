<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Jual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class JualController extends Controller
{    function index() {

        $datajual = Barang::where('is_jual', 'Jual')->latest()->get();
        return view('sale',compact('datajual'));
    }
    function keranjangjual() {
        $keranjangjual = Jual::where('users_id', Auth::user()->id)->latest()->get();
        return view('detail_belanja', compact('keranjangjual'));
    }

    public function store(Request $request)
    {
   
   
        // Validasi input
        $validated = Validator::make( $request->all(), [
            'nama' => 'required',
            'harga_total' => 'required',
            'stok_barang' => 'required',
            'status' => 'required',
        ]);
   
        if ($validated->fails()) {
           return response()->json($validated->errors(), 422);
       }
   
        // Simpan data ke tabel keranjang
        Jual::create([
           'users_id' => Auth::user()->id,
           'barangs_id' => $request->id_barang,
           'harga_total' => 0,
           'stok_barang' => $request ->stok_barang,
           'status' => 'pending',
        ]);
   
        // Kirimkan respon JSON
       //  return response()->json(['success' => true, 'message' => 'Data keranjang berhasil disimpan!']);
        return response()->json([
           'success' => true,
           'icon' => 'success',
           'title' => '',
           'text' => 'Keranjang berhasil dibuat!',
           'data'    => '',
       ]);
    }



     public function fetchBarang()
    {
        $datajual = Barang::all(); // Ambil data dari tabel barang
        return response()->json(['data' => $datajual], 200); // Kirimkan data sebagai JSON
    }

    public function addToCart(Request $request)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'id' => 'required|integer',
            'nama' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'image' => 'required|string',
        ]);
    
        // Simpan data ke session atau database
        $cart = session()->get('cart', []);
        $cart[$validated['id']] = [
            'nama' => $validated['nama'],
            'harga' => $validated['harga'],
            'stok' => $validated['stok'],
            'image' => $validated['image'],
            'quantity' => isset($cart[$validated['id']]) ? $cart[$validated['id']]['quantity'] + 1 : 1,
        ];
        session()->put('cart', $cart);
    
        return response()->json(['success' => true]);
    }
    
    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('detail_belanja', compact('cart'));
    }
    


    


}

