<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rent_detail extends Model
{
    protected $guarded = ['id'];

    public function barang(){
        return $this->hasOne(Barang::class, 'id', 'barangs_id');
    }
}
