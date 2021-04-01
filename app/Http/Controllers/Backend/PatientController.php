<?php

namespace App\Http\Controllers\Backend;

use App\Exports\PatientExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Http\Requests\PatientUpdateRequest;
use App\Imports\PatientImport;
use App\Models\FrontendUser;
use App\Models\Patient;
use App\Services\PatientService;
use App\Services\ResponseService;
use App\Traits\FileUpload;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;

class PatientController extends Controller
{
    use FileUpload;
    protected $patientService;
    protected $message;
    protected $excel;
    public function __construct(Excel $excel)
    {
        $this->patientService = new PatientService;
        $this->message = new ResponseService;
        $this->excel = $excel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        return view('backend.pages.patient.index');
    }

    public function patientExcel(): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return $this->excel->download(new PatientExport, 'patient.xlsx');
    }

    public function patientCsv(): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return $this->excel->download(new PatientExport, 'patient.csv');
    }

    public function patientPdf(): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return $this->excel->download(new PatientExport, 'patient.pdf', Excel::DOMPDF);
    }

    public function patientImport(Request $request): RedirectResponse
    {
        $data = $request->file('file');
        $import = new PatientImport;
        $patient = $import->import($data);
        $error = ($import->errors());
        if ($patient) {
            $notification = $this->message->success('Patient', 'Patient Import Successfully ');
        } else {
            if (isset($errors) && $errors->any()) {
                foreach ($error->all() as $item) {
                    $notification = $this->message->error('Patient', $item);
                }
            } else {
                $notification = $this->message->error('Patient', 'Patient Field Required');
            }

        }
        return redirect()->back()->with($notification);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $bloods = $this->patientService->getBloods();
        return view('backend.pages.patient.create', compact('bloods'));
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function patientList(Request $request)
    {
        $data = $request->all();
        $patients = FrontendUser::search($request->search)->where('type', 'patient')->orderBy('id', 'DESC')->paginate(10);
        return view('backend.pages.patient.dataList', compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PatientRequest $request
     * @return RedirectResponse
     */
    public function store(PatientRequest $request): RedirectResponse
    {
        $data = $request->all();
        if ($request->hasFile('picture')) {
            $data['picture'] = $this->ImageUpload($request, 'picture', 'frontend-user/', 'user_');
        }
        $patient = $this->patientService->create($data);
        if ($patient) {
            $notification = $this->message->success('Patient', 'Patient Added Successfully ');
        } else {
            $notification = $this->message->error('Patient', 'Patient Field Required');
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param Patient $patient
     * @return Response
     */
    public function show(Patient $patient): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View|Response
     */
    public function edit($id)
    {
        $patient = $this->patientService->getById($id);
        $bloods = $this->patientService->getBloods();
        return view('backend.pages.patient.edit', compact('patient', 'bloods'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Patient $patient
     * @return Response
     */
    public function update(PatientUpdateRequest $request, $id)
    {
        $data = $request->all();
        if ($request->hasFile('picture')) {
            $data['picture'] = $this->ImageUpload($request, 'picture', 'frontend-user/', 'user_');
        }
        $patient = $this->patientService->update($data, $id);
        if ($patient) {
            $notification = $this->message->success('Patient', 'Patient Updated Successfully');
        } else {
            $notification = $this->message->success('Patient', 'Patient Input Filed Required');
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Patient $patient
     * @return Response
     */
    public function destroy($id)
    {
        $patient = $this->patientService->delete($id);
        if ($patient) {
            $notification = $this->message->success('Patient', 'Patient Deleted Successfully');
        } else {
            $notification = $this->message->error('Patient', 'System Problem');
        }
        return redirect()->back()->with($notification);
    }
    public function status($id)
    {
        $patient = $this->patientService->status($id);
        if ($patient) {
            $notification = $this->message->success('Patient', 'Patient Status Successfully');
        } else {
            $notification = $this->message->error('Patient', 'System Problem');
        }
        return redirect()->back()->with($notification);
    }
}
