<?php
namespace App\Http\Controllers;

use App\Models\Jual;
use App\Models\Rent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JualController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('rolemenucek');
    }
    public function index(Request $request)
{
    // Default query
    $query = Jual::with(['user', 'barangs'])->where('status', 'terbayar');

    // Default waktu mulai dan akhir
    $waktu_mulai = Jual::min('updated_at');
    $waktu_akhir = Jual::max('updated_at');



    // Filter berdasarkan waktu
    if ($request->filled(['waktu_mulai', 'waktu_akhir'])) {
        $request->validate([
            'waktu_mulai' => 'required|date',
            'waktu_akhir' => 'required|date|after_or_equal:waktu_mulai',
        ]);

        // Pastikan waktu lengkap untuk rentang
        $start_date = Carbon::parse($request->waktu_mulai)->startOfDay(); // 00:00:00
        $end_date = Carbon::parse($request->waktu_akhir)->endOfDay();     // 23:59:59

        $query->whereBetween('updated_at', [$start_date, $end_date]);

        $waktu_mulai = $start_date->toDateString();
        $waktu_akhir = $end_date->toDateString();
    }



    $all_data = $query->latest()->get();

    return view('transaksi.jual', compact('all_data', 'waktu_mulai', 'waktu_akhir'));
}
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
