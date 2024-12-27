<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jual extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function barangs(){
        return $this->belongsToMany(Barang::class, 'juals', 'id', 'barangs_id');
    }
}
