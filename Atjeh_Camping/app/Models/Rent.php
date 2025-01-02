<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $guarded = ['id'];

    public function details(){
        return $this->hasMany(Rent_detail::class, 'rents_id');
    }
}
