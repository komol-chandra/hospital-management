<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Prescription;
use App\Models\Schedule;
use App\Services\PrescriptionService;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    protected $prescriptionService;
    public function __construct()
    {
        $this->prescriptionService = new PrescriptionService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('admin')->user()->type == "patient") {
            $patientId = Auth::guard('admin')->user()->id;
            $appointment = Appointment::where('patient_id', $patientId)->get();
            $prescription = Prescription::with('doctor', 'doctor.departments')->where('patient_id', $patientId)->orderBy('id', 'desc')->get();
            return view('frontend.user.view-dashboard', compact('appointment', 'prescription'));
        }
        $today = Carbon::now()->format('Y-m-d');
        $doctorId = Auth::guard('admin')->user()->parentId;
        $data = Appointment::with('users')->where('date', $today)->where('doctor_id', $doctorId)->get();
        $scheduleModel = new Schedule();
        $dayOfTheWeek = Carbon::now()->dayOfWeek;
        $schedule = Schedule::where('doctor_id', $doctorId)->where('day_id', $dayOfTheWeek)->first();
        return view('frontend.user.doctor-dashboard', compact('data', 'schedule'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->prescriptionService->getById($id);
        $birthday = $data->patient['birthday'];
        $age = $this->prescriptionService->getAgeAttribute($birthday);
        $medicineData = $this->prescriptionService->getByIdMedicine($id);
        return view('frontend.user.prescription-invoice', compact('data', 'age', 'medicineData'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
