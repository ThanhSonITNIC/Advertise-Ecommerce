<?php

namespace App\Observers;

use App\Entities\ImportMaterial;

class ImportMaterialObserver
{
    /**
     * Handle the import material "created" event.
     *
     * @param  \App\ImportMaterial  $importMaterial
     * @return void
     */
    public function created(ImportMaterial $importMaterial)
    {
        $current_quantity = $importMaterial->material->quantity;
        $quantity = $current_quantity + $importMaterial->quantity;
        $importMaterial->material->update(['quantity' => $quantity]);
    }

    /**
     * Handle the import material "updated" event.
     *
     * @param  \App\ImportMaterial  $importMaterial
     * @return void
     */
    public function updated(ImportMaterial $importMaterial)
    {
        //
    }

    /**
     * Handle the import material "deleted" event.
     *
     * @param  \App\ImportMaterial  $importMaterial
     * @return void
     */
    public function deleted(ImportMaterial $importMaterial)
    {
        //
    }

    /**
     * Handle the import material "restored" event.
     *
     * @param  \App\ImportMaterial  $importMaterial
     * @return void
     */
    public function restored(ImportMaterial $importMaterial)
    {
        //
    }

    /**
     * Handle the import material "force deleted" event.
     *
     * @param  \App\ImportMaterial  $importMaterial
     * @return void
     */
    public function forceDeleted(ImportMaterial $importMaterial)
    {
        //
    }
}
