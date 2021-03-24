<?php

namespace App\Observers;

use App\Models\Doctor;
use App\Models\FrontendUser;
use Illuminate\Support\Facades\Hash;

class DoctorObserver
{
    /**
     * Handle the Doctor "created" event.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return void
     */
    public function created(Doctor $doctor)
    {
        $data = request();
        $user = new FrontendUser();
        $user->type = 'doctor';
        $user->parentId = $doctor->id;
        $user->password = Hash::make($data['password']);
        $user->name = $data['name'];
        $user->full_name = $data['full_name'];
        $user->email = $data['email'];
        $user->address = $data['address'];
        $user->mobile = $data['mobile'];
        $user->birthday = $data['birthday'];
        $user->picture = isset($data['picture']) ? $data['picture'] : 'backend/files/profile.jpg';
        $user->blood_id = $data['blood_id'];
        $user->gender = $data['gender'];
        $user->save();
    }

    /**
     * Handle the Doctor "updated" event.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return void
     */
    public function updated(Doctor $doctor)
    {
        //
    }

    /**
     * Handle the Doctor "deleted" event.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return void
     */
    public function deleted(Doctor $doctor)
    {
        //
    }

    /**
     * Handle the Doctor "restored" event.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return void
     */
    public function restored(Doctor $doctor)
    {
        //
    }

    /**
     * Handle the Doctor "force deleted" event.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return void
     */
    public function forceDeleted(Doctor $doctor)
    {
        //
    }
}
