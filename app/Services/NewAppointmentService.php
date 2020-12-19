<?php
namespace App\Services;

use App\Models\NewAppointment;
use Illuminate\Support\Facades\Auth;

class NewAppointmentService
{
    public function createOrUpdate($data)
    {
        $userId = Auth::user()->id;
        if (isset($data['id'])) {
            $appointment = NewAppointment::findOrFail($data['id']);
            $appointment->updated_by = $userId;
        } else {
            $appointment = new NewAppointment();
            $appointment->created_by = $userId;
        }
        $appointment->fill($data)->save() ? $appointment : null;
        return $appointment ?? null;
    }
}
