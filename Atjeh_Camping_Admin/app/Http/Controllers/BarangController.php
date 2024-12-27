<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class BarangController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('rolemenucek');
    }
   public function index()
   {
    return view('masterdata.barang');
   }

  
   public function post_store(Request $request){
      $validator = Validator::make($request->all(), [
        'nama' => 'required', 
        'deskripsi' => 'required',
        'harga' => 'required', 
        'stok_barang' => 'required', 
        'image_url' => 'required', 
        'merk' => 'required',
        'kategori' => 'required',
        'is_jual' => 'required',
          
      ]);

      if ($validator->fails()) {
          return response()->json($validator->errors(), 422);
      }

      $image_url = Str::random(100) . '.' .$request->image_url->getClientOriginalExtension();
      $request->image_url->move(public_path() . '/uploads/', $image_url);

      Barang::create([
          'nama' => $request->nama,
          'deskripsi' => $request->deskripsi,
          'harga' => $request->harga,
          'stok_barang' => $request->stok_barang,
          'image_url' => $image_url,
          'merk' => $request->merk,
          'kategori' => $request->kategori,
          'is_jual' => $request->is_jual,
     ]);

      return response()->json([
            'success' => true,
            'icon' => 'success',
            'title' => 'Barang',
            'text' => 'Data Berhasil Disimpan!',
            'data'    => ''
        ]);
  
     }



     function get_datatable(Request $request)
{
    $data = Barang::get(); // Ambil data dari model Barang

    if ($request->ajax()) {
        return DataTables::of($data)
            ->addColumn('image_url', function ($data) {
                return '<img src="'.url('/uploads/'.$data->image_url).'" style="width:150px">';
                
                // return $data->image_url ?? '-'; // Pastikan properti ada
            })
            ->addColumn('nama', function ($data) {
                return $data->nama ?? '-';
            })
            ->addColumn('merk', function ($data) {
                return $data->merk ?? '-';
            })
            ->addColumn('harga', function ($data) {
                return $data->harga ?? 0;
            })
            ->addColumn('stok_barang', function ($data) {
                return $data->stok_barang ?? 0;
            })
            ->addColumn('deskripsi', function ($data) {
                return $data->deskripsi ?? '-';
            })
            ->addColumn('kategori', function ($data) {
                return $data->kategori ?? '-';
            })
            ->addColumn('is_jual', function ($data) {
                return $data->is_jual ?? '-';
            })
            ->addColumn('action', function ($data) {
                return '<div style="display: inline-flex;">
                        <a href="javascript:void(0)" id="btn-edit" data-id="' . $data->id . '" class="btn btn-sm btn-info mr-2">Edit</a>
                        <a href="javascript:void(0)" id="btn-delete" data-id="' . $data->id . '" class="btn btn-sm btn-danger">Delete</a>
                        </div>';
            })
            ->rawColumns(['image_url', 'action']) // Biarkan kolom 'action' berisi HTML
            ->addIndexColumn() // Tambahkan indeks
            ->make(true); // Formatkan untuk DataTables
    }

    return response()->json(['error' => 'Invalid request'], 400);
}
function show($barang_id)  {
    $barang = Barang::find($barang_id);
    return response()->json(['barang'=>$barang]);
    
}
function update($barang_id,Request $request)   {

    
    $validator = Validator::make($request->all(), [
        'namabarang' => 'required', 
        'deskripsi_barang' => 'required',
        'harga' => 'required', 
        'stok_barang' => 'required',  
        'merk' => 'required',
        'kategori_barang' => 'required',
          
      ]);

      if ($validator->fails()) {
          return response()->json($validator->errors(), 422);
      }

      if ($request ->image_url == '' ) {
        $image_url = $request->old_image_url;
      }
      else{          
          $image_url = Str::random(100) . '.' .$request->image_url->getClientOriginalExtension();
          $request->image_url->move(public_path() . '/uploads/', $image_url);
      }


      Barang::find($barang_id)->update([
          'namabarang' => $request->namabarang,
          'deskripsi_barang' => $request->deskripsi_barang,
          'harga' => $request->harga,
          'stok_barang' => $request->stok_barang,
          'image_url' => $image_url,
          'merk' => $request->merk,
          'kategori_barang' => $request->kategori_barang,
     ]);

      return response()->json([
            'success' => true,
            'icon' => 'success',
            'title' => 'Role',
            'text' => 'Data Berhasil Disimpan!',
            'data'    => ''
        ]);
    
}

function delete_destroy($users_id)
    {
        Barang::destroy($users_id);

        return response()->json([
            'success' => true,
            'icon' => 'warning',
            'title' => 'User',
            'text' => 'Data Telah Dihapus!',
            'data'    => ''
        ]);
    }

}
