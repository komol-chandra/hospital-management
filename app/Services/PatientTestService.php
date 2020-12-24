<?php
namespace App\Services;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\PatientTest;
use App\Models\Test;
use File;
use Illuminate\Support\Facades\Auth;

class PatientTestService
{
    public function lists()
    {
        return PatientTest::with('tests', 'doctors', 'patients')->orderBy('id', 'DESC')->paginate(10);
    }
    public function getById($id)
    {
        return PatientTest::findOrFail($id);
    }
    public function status($id)
    {
        $data = PatientTest::findOrFail($id);
        if ($data->status == 1) {
            $data->status = 0;
        } else {
            $data->status = 1;
        }
        return $data->save();
    }
    public function delete($id)
    {
        return PatientTest::findOrFail($id)->delete();

    }
    public function view($id)
    {
        return PatientTest::with('tests', 'doctors', 'patients')->findOrFail($id);
    }
    public function getTests()
    {
        return Test::where('status', '1')->pluck('name', 'id');
    }
    public function getDoctors()
    {
        return Doctor::where('status', '1')->pluck('name', 'id');
    }
    public function getPatients()
    {
        return Patient::where('status', '1')->pluck('name', 'id');
    }
    public function createOrUpdate($data)
    {
        $user_id = Auth::user()->id;
        if (!empty($data["id"])) {
            $patientTest = PatientTest::findOrFail($data['id']);
            // if ($data['file']) {
            //     if (File::exists($patientTest->picture)) {
            //         File::delete($patientTest->picture);
            //     }
            // }
            $patientTest->updated_by = $user_id;
        } else {
            $patientTest = new PatientTest();
            $patientTest->created_by = $user_id;
        }
        if (isset($data['file'])) {
            $patientTest->file = $data['file'];
        }
        return $patientTest->fill($data)->save() ? $patientTest : null;
    }
}
