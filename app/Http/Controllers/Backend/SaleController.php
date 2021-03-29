<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Generic;
use App\Models\Medicine;
use App\Models\MedicineType;
use App\Models\Sale;
use App\Models\StockDetails;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saleSearch(Request $request)
    {
        $medicines = Medicine::where(function ($query) use ($request) {
            if ($request->type_id) {
                $query->where('type_id', $request->type_id);
            }
            if ($request->generic_id) {
                $query->where('generic_id', $request->generic_id);
            }
            if ($request->search) {
                $query->where('name', 'LIKE', '%' . $request->search . '%');
            }
        })->where('status', '1')->orderBy('id', 'asc')->get();
        return response()->json($medicines);

    }

    public function getBatch($id)
    {
        $data = StockDetails::where('medicine_id', $id)->get();
        $batch_data = json_decode($data);
        return response()->json($batch_data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = MedicineType::where('status', '1')->get();
        $generic = Generic::where('status', '1')->get();
        $medicines = Medicine::where('status', '1')->get();
        $customers = Customer::where('status', '1')->get();
        return view('backend.pages.sale.add-sale', compact('type', 'generic', 'medicines', 'customers'));
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
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
