<?php
namespace App\Http\Controllers;

use App\Models\Jual;
use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JualController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('rolemenucek');
    }
    public function index()
   {

    $all_data =  Jual::with(['user', 'barangs'])->get();
    // var_dump($all_data[0]->barangs[0]->nama);
    return view('transaksi.jual', compact('all_data'));
   } //

   public function post_store(Request $request){
    $validator = Validator::make($request->all(), [
        'name' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }
   }


    public function detail($id)
    {
        $jual = Jual::with(['user', 'barangs'])->findOrFail($id); // Eager load user dan barang

        return view('transaksi.detail', compact('jual'));
    }
}
