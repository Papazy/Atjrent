<?php

namespace App\Http\Controllers;
use App\Models\Detailkeranjangsewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class DetailkeranjangsewaController extends Controller
{
     /**
     * Menampilkan data keranjang.
     */
    public function index()
    {
        $keranjang = Detailkeranjangsewa::all();
        return view('keranjang.detailkeranjangsewa', compact('keranjang'));
    }

    /**
     * Menyimpan data keranjang baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_keranjang' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'tujuan_sewa' => 'required',
        ]);

        Detailkeranjangsewa::create($request->all());

        return redirect()->route('keranjang.detailkeranjangsewa')->with('success', 'Keranjang berhasil ditambahkan.');
    }

    // public function post_store(Request $request){
    //     $validator = Validator::make($request->all(), [
    //       'nama_keranjang' => 'required',
    //         'tanggal_mulai' => 'required',
    //         'tanggal_selesai' => 'required',
    //         'tujuan_sewa' => 'required',
            
    //     ]);
  
    //     if ($validator->fails()) {
    //         return response()->json($validator->errors(), 422);
    //     }
    //     Detailkeranjangsewa::create([
    //         'nama_keranjang' => $request->nama_keranjang,
    //         'tanggal_mulai' => $request->tanggal_mulai,
    //         'tanggal_selesai' => $request->tanggal_selesai,
    //         'tujuan_sewa' => $request->tujuan_sewa,
            
    //    ]);
  
    //     return response()->json([
    //           'success' => true,
    //           'icon' => 'success',
    //           'title' => 'Role',
    //           'text' => 'Data Berhasil Disimpan!',
    //           'data'    => ''
    //       ]);
    
    //    }






    /**
     * Menghapus data keranjang.
     */
     function delete_destroy($users_id)
    {
        Detailkeranjangsewa::destroy($users_id);

        return response()->json([
            'success' => true,
            'icon' => 'warning',
            'title' => 'User',
            'text' => 'Data Telah Dihapus!',
            'data'    => ''
        ]);
    }
}
