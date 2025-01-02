<?php

namespace App\Models;

use App\Observers\RentDetailObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([RentDetailObserver::class])]
class Rent_detail extends Model
{
    protected $guarded = ['id'];

    function barang() {
        return $this->belongsTo(Barang::class, 'barangs_id');
    }
}
