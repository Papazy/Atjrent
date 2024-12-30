<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rent;
use Illuminate\Support\Str;


class UploadController extends Controller
{
    public function uploadKtp(Request $request){
        // mendapatkan rent_id dan image
        try{
            // return ($request->rent_id);
            echo "console.log('masuk upload ktp')";
            $image_url = Str::random(100) . '.' .$request->image->getClientOriginalExtension();
            $request->image->move(public_path() . '/uploads/', $image_url);
            $rent = Rent::where('id', $request->rent_id)->first();
            $rent->image_url = $image_url;
            $rent->save();
            return response()->json([
                'message' => 'File uploaded successfully',
                'path' => $image_url,
            ], 200);
        }catch(\Exception $e){
            // log error


            return response()->json([
                'message' => 'Failed to upload image',
            ], 500);
        }

    }
}
