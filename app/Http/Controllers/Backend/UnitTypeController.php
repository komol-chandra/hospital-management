<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\UnitType;
use App\Services\ResponseService;
use App\Services\UnitTypeService;
use Illuminate\Http\Request;

class UnitTypeController extends Controller
{
    protected $unitTypeService;
    protected $message;
    public function __construct()
    {
        $this->unitTypeService = new UnitTypeService;
        $this->message = new ResponseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->unitTypeService->lists();
        return view('backend.pages.unit-type.index', compact('data'));
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
        $data = $request->all();
        $unit = $this->unitTypeService->createOrUpdate($data);
        if ($unit) {
            $notification = $this->message->success('Unit Type', 'Unit Type Insert Successfully');
        } else {
            $notification = $this->message->error('Unit Type', 'Input Filed Required');
        }
        $status = 200;
        return response()->json($notification, $status);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnitType  $unitType
     * @return \Illuminate\Http\Response
     */
    public function show(UnitType $unitType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnitType  $unitType
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitType $unitType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UnitType  $unitType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitType $unitType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnitType  $unitType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit = $this->unitTypeService->delete($id);
        if ($unit) {
            $notification = $this->message->success('Unit', 'Unit Type Deleted Successfully');
        } else {
            $notification = $this->message->error('Unit', 'System Problem');
        }
        return redirect()->back()->with($notification);
    }
}
