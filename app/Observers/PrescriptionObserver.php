<?php

namespace App\Observers;

use App\Jobs\PresciptionMedicineInsert;
use App\Models\Prescription;

class PrescriptionObserver
{
    /**
     * Handle the Prescription "created" event.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return void
     */
    public function created(Prescription $prescription)
    {
        PresciptionMedicineInsert::dispatch($prescription);
    }

    /**
     * Handle the Prescription "updated" event.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return void
     */
    public function updated(Prescription $prescription)
    {
        //
    }

    /**
     * Handle the Prescription "deleted" event.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return void
     */
    public function deleted(Prescription $prescription)
    {
        //
    }

    /**
     * Handle the Prescription "restored" event.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return void
     */
    public function restored(Prescription $prescription)
    {
        //
    }

    /**
     * Handle the Prescription "force deleted" event.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return void
     */
    public function forceDeleted(Prescription $prescription)
    {
        //
    }
}
