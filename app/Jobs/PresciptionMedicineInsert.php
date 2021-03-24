<?php

namespace App\Jobs;

// use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Models\PrescriptionMedicine;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PresciptionMedicineInsert implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, SerializesModels;

    protected $data;
    protected $prescription;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($prescription)
    {
        $this->data = request()->all();
        $this->prescription = $prescription;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // dd($this->data);
        foreach ($this->data['day'] as $key => $value) {
            $medicineData[] = [
                'prescription_id' => $this->prescription->id,
                'day'             => $value,
                'medicine'        => $this->data['medicine'][$key],
                'duration'        => $this->data['duration'][$key],
                'sequence'        => $this->data['sequence'][$key],
                'day'             => $this->data['day'][$key],
                'instruction'     => $this->data['instruction'][$key],
            ];
        }
        PrescriptionMedicine::insert($medicineData);
    }
}
