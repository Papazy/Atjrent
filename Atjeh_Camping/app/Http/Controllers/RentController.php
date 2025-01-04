<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Rent;
use App\Models\Rent_detail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RentController extends Controller
{
    // Fungsi untuk menampilkan halaman rent
    public function index(Request $request)
    {
        // Ambil query parameter dari filter
        $category = $request->input('category'); // Filter kategori
        $minPrice = $request->input('min_price'); // Filter harga minimum
        $maxPrice = $request->input('max_price'); // Filter harga maksimum

        $q = $request->input('q');


        // Query dasar untuk barang yang disewa
        $query = Barang::where('is_jual', 'Sewa');

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

        // Kirim data ke view
        return view('rent', compact('data'));
    }

    function keranjang()
    {
        $keranjang = Rent::where('users_id', Auth::user()->id)
            ->latest()
            ->get();
        return view('checkout', compact('keranjang'));
    }

    function keranjangDetail($id)
    {
        $rent = Rent::findOrFail($id);
        $barangs = Rent_detail::where('rents_id', $rent->id)->get();
        $tanggal_mulai = $rent->tanggal_mulai;
        $tanggal_selesai = $rent->tanggal_selesai;
        $keranjang_id = $id;
        return view('list_barang', compact(['barangs', 'keranjang_id', 'tanggal_mulai', 'tanggal_selesai', 'rent']));
    }

    // Fungsi untuk menyimpan data keranjang
    public function store(Request $request)
    {


        // Validasi input
        $validated = Validator::make($request->all(), [
            'nama_keranjang' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'tujuan_sewa' => 'required',
        ]);

        if ($validated->fails()) {
            return response()->json($validated->errors(), 422);
        }

        // Simpan data ke tabel keranjang
        Rent::create([
            'users_id' => Auth::user()->id,
            'nama_keranjang' => $request->nama_keranjang,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'tujuan_sewa' => $request->tujuan_sewa,
            'harga_total' => 0,
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
    public function fetchKeranjangSewa()
    {
        // Ambil semua data dari tabel keranjangsewa
        $keranjang = Rent::all();

        // Return data sebagai JSON
        return response()->json($keranjang);
    }

    function keranjangAjax()
    {
        $keranjang = Rent::where('users_id', Auth::user()->id)
            ->whereNotIn('status', ['terbayar', 'dikembalikan'])
            ->where('tanggal_mulai', '>', Carbon::now())
            ->latest()
            ->get();
        return response()->json([
            'data' => $keranjang
        ]);
    }

    function barangAjax(Barang $barang)
    {
        return response()->json([
            'data' => $barang,
        ]);
    }

    function storeBarang(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'stok_barang' => 'required',
            'rents_id' => 'required',
        ]);

        if ($validated->fails()) {
            return response()->json($validated->errors(), 422);
        }

        Rent_detail::create([
            'rents_id' => $request->rents_id,
            'barangs_id' => $request->id_barang,
            'stok_barang' => $request->stok_barang,
        ]);

        return response()->json([
            'success' => true,
            'icon' => 'success',
            'title' => '',
            'text' => 'Barang di tambahkan!',
            'data'    => '',
        ]);
    }
    function get_datatable(Request $request)
    {
        $data = Rent_detail::get(); // Ambil data dari model Barang

        if ($request->ajax()) {
            return Rent_detail::of($data)
                ->addColumn('image_url', function ($data) {
                    return '<img src="' . url('/uploads/' . $data->image_url) . '" style="width:150px">';

                    // return $data->image_url ?? '-'; // Pastikan properti ada
                })
                ->addColumn('rents_id', function ($data) {
                    return $data->rents_id ?? '-';
                })
                ->addColumn('barangs_id', function ($data) {
                    return $data->barangs_id ?? '-';
                })

                ->addColumn('stok_barang', function ($data) {
                    return $data->stok_barang ?? 0;
                })
                ->addColumn('action', function ($data) {
                    return '<div style="display: inline-flex;">
                         <a href="javascript:void(0)" id="btn-delete" data-id="' . $data->id . '" class="btn btn-sm btn-danger">Delete</a>
                         </div>';
                })
                ->rawColumns(['image_url', 'action']) // Biarkan kolom 'action' berisi HTML
                ->addIndexColumn() // Tambahkan indeks
                ->make(true); // Formatkan untuk DataTables
        }

        return response()->json(['error' => 'Invalid request'], 400);
    }

    public function destroy($id)
    {
        try {
            // Cari data berdasarkan ID
            $rentDetail = Rent_detail::findOrFail($id);

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

}
