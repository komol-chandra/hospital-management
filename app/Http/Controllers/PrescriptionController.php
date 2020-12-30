<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrescriptionRequest;
use App\Models\Prescription;
use App\Models\PrescriptionMedicine;
use App\Services\PrescriptionService;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrescriptionController extends Controller
{
    protected $prescriptionService;
    protected $message;
    public function __construct()
    {
        $this->prescriptionService = new PrescriptionService;
        $this->massage = new ResponseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->prescriptionService->lists();
        return view('backend.pages.prescription.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = $this->prescriptionService->getDoctors();
        $patients = $this->prescriptionService->getPatients();
        $medicines = $this->prescriptionService->getMedicines();
        $medicineJs = $this->prescriptionService->getMedicineJs();
        return view('backend.pages.prescription.create', compact('doctors', 'patients', 'medicines', 'medicineJs'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrescriptionRequest $request)
    {

        try {
            $data = $request->all();
            $prescription = new Prescription();
            $user_id = Auth::user()->id;
            $prescription->created_by = $user_id;
            $prescription->fill($data)->save();

            foreach ($request->day as $key => $value) {
                $medicineData[] = [
                    'prescription_id' => $prescription->id,
                    'day'             => $value,
                    'medicine_id'     => $request->medicine_id[$key],
                    'duration'        => $request->duration[$key],
                    'sequence'        => $request->sequence[$key],
                    'day'             => $request->day[$key],
                    'instruction'     => $request->instruction[$key],
                ];
            }
            $medicine_model = PrescriptionMedicine::insert($medicineData);
            if ($medicine_model && $prescription) {
                $notification = $this->massage->success('Prescription', 'Prescription Added Successfully ');
            } else {
                $notification = $this->massage->error('Prescription', 'Prescription Field Required');
            }
            return redirect()->back()->with($notification);
        } catch (\Exception $e) {
            return redirect()->back()->with("status", "message=" . $e->getMessage());

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctors = $this->prescriptionService->getDoctors();
        $patients = $this->prescriptionService->getPatients();
        $medicines = $this->prescriptionService->getMedicines();
        $medicineJs = $this->prescriptionService->getMedicineJs();
        $data = $this->prescriptionService->getById($id);
        // dd($data->toArray());
        $birthday = $data->patient['birthday'];
        // dd($birthday);
        $age = $this->prescriptionService->getAgeAttribute($birthday);
        // dd($age);
        $medicineData = $this->prescriptionService->getByIdMedicine($id);
        // dd($medicineData->toArray());
        return view('backend.pages.prescription.invoice', compact('data', 'doctors', 'patients', 'medicines', 'medicineJs', 'medicineData', 'age'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescription $prescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->prescriptionService->delete($id);
        if ($data) {
            $notification = $this->massage->success('Prescription', 'Prescription Deleted  Successfully ');
        } else {
            $notification = $this->massage->error('Prescription', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
    public function status($id)
    {
        $data = $this->prescriptionService->status($id);
        if ($data) {
            $notification = $this->massage->success('Prescription', 'Prescription Status Updated Successfully ');
        } else {
            $notification = $this->massage->error('Prescription', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
}