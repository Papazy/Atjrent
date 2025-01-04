<?php

namespace App\Observers;

use App\Models\Jual;

class JualObserver
{
    /**
     * Handle the Jual "created" event.
     */
    public function created(Jual $jual): void
    {
        $this->updateHargaTotal($jual);
    }

    /**
     * Handle the Jual "updated" event.
     */
    public function updated(Jual $jual): void
    {
        $this->updateHargaTotal($jual);
    }

    /**
     * Handle the Jual "deleted" event.
     */
    public function deleted(Jual $jual): void
    {
        //
    }

    /**
     * Handle the Jual "restored" event.
     */
    public function restored(Jual $jual): void
    {
        //
    }

    /**
     * Handle the Jual "force deleted" event.
     */
    public function forceDeleted(Jual $jual): void
    {
        //
    }   

    private function updateHargaTotal(Jual $jual): void
    {
        $jual->harga_total = $jual->barang->harga * $jual->stok_barang;
        $jual->save();
    }
}
