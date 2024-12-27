<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function details()
    {
        return $this->hasMany(Rent_detail::class, "rents_id", "id");
    }

    public function barangs()
    {
        return $this->hasManyThrough(Barang::class, Rent_detail::class, 'rents_id', 'id', 'id', 'barangs_id');
    }
}
