<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jual extends Model
{
    protected $guarded = ['id'];

    function barang() {
        return $this->belongsTo(Barang::class, 'barangs_id');
    }
}
