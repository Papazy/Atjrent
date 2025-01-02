<?php

namespace App\Observers;

use App\Models\Rent;
use App\Models\Rent_detail;

class RentDetailObserver
{
    /**
     * Handle the Rent_detail "created" event.
     */
    public function created(Rent_detail $rent_detail): void
    {
        $this->updateHargaTotal($rent_detail);
    }

    /**
     * Handle the Rent_detail "updated" event.
     */
    public function updated(Rent_detail $rent_detail): void
    {
        $this->updateHargaTotal($rent_detail);
        //
    }

    /**
     * Handle the Rent_detail "deleted" event.
     */
    public function deleted(Rent_detail $rent_detail): void
    {
        $this->updateHargaTotal($rent_detail);
        //
    }

    /**
     * Handle the Rent_detail "restored" event.
     */
    public function restored(Rent_detail $rent_detail): void
    {
        //
        $this->updateHargaTotal($rent_detail);
    }

    /**
     * Handle the Rent_detail "force deleted" event.
     */
    public function forceDeleted(Rent_detail $rent_detail): void
    {
        //
        $this->updateHargaTotal($rent_detail);
    }

    private function updateHargaTotal(Rent_detail $rent_detail){
        $rent = Rent::find($rent_detail->rents_id);
        if($rent){
            $rent->harga_total = $rent->details->sum(function ($detail){
                return $detail->stok_barang * $detail->barang->harga;
            });
            $rent->save();
        }
    }
}
