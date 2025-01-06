<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Jual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class JualController extends Controller
{    function index(Request $request) {

          // Ambil query parameter dari filter
          $category = $request->input('category'); // Filter kategori
          $minPrice = $request->input('min_price'); // Filter harga minimum
          $maxPrice = $request->input('max_price'); // Filter harga maksimum
          $q = $request->input('q');

          // Query dasar untuk barang yang disewa
          $query = Barang::where('is_jual', 'Jual');

          // Filter berdasarkan kategori jika ada
          if ($category && $category != 'all') {
              $query->where('kategori', $category);
          }

          // Filter berdasarkan harga minimum jika ada
          if ($minPrice) {
              $query->where('harga', '>=', $minPrice);
          }

          // Filter berdasarkan harga maksimum jika ada
          if ($maxPrice) {
              $query->where('harga', '<=', $maxPrice);
          }

            // Filter berdasarkan pencarian
            if ($q) {
                $query->where('nama', 'like', "%$q%");
            }

          // Ambil data yang sudah difilter
          $data = $query->latest()->get();

        return view('sale',compact('data'));
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

    public function addToBuy(Request $request)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'id' => 'required|integer',
            'jumlah' => 'required|numeric',
        ]);

        $barang = Barang::findOrFail($validated['id']);
        // mendapatkan harga
        $harga = $barang->harga * $validated['jumlah'];

        // Simpan data ke dalam jual
        Jual::create([
            'users_id' => Auth::user()->id,
            'barangs_id' => $validated['id'],
            'harga_total' => $harga,
            'stok_barang' => $validated['jumlah'],
            'status' => 'pending',
            'snap_token' => 'tes',
        ]);

        return response()->json(['success' => true]);
    }

    public function viewCart()
    {
        // mendapatkan belanja user dari database
        $item = Jual::with('barang')->where('users_id', Auth::user()->id)->where('status', 'pending')->latest()->first();

        return view('detail_belanja', compact('item'));
    }

    public function destroy($id)
    {

        try {
            // Cari data berdasarkan ID
            $rentDetail = Jual::findOrFail($id);

            // Hapus data
            $rentDetail->delete();

            // Berikan respon berhasil
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus!',
            ]);
        } catch (\Exception $e) {
            // Jika terjadi error, tangani di sini
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menghapus data!',
            ], 500);
        }
    }

        public function history(){
            $items = Jual::where('users_id', Auth::user()->id)->where('status', 'terbayar')->latest()->get();
            return view('riwayat', compact('items'));
        }

}

