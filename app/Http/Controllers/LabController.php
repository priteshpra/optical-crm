<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Lab;

class LabController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labs = Lab::orderBy('id', 'desc')->get();
        return view('labs.index', compact('labs'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //return $data;
        $this->validate($request, []);
        $data = $request->all();
        $insert['created_date'] = date('Y-m-d', strtotime($data['created_date']));
        $insert['bill'] = $data['bill'];
        $insert['cust_name'] = $data['cust_name'];
        $insert['frame_type'] = $data['frame_type'];
        $insert['fitter'] = $data['fitter'];
        $insert['receive_date'] = date('Y-m-d', strtotime($data['receive_date']));
        $insert['delivery_date'] = date('Y-m-d', strtotime($data['delivery_date']));
        $insert['time'] = $data['time'];
        Lab::create($insert);
        return back()->with('success', 'Lab saved Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Lab::find($id);
        //return $patient->appointments()->get();
        $doctors = Doctor::get();
        return view('labs.profile', compact('patient', 'doctors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lab = Lab::find($id);
        return view('labs.edit', compact('lab'));
        // return back()->with('success', 'Status changed successfully.');
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
        $patient = Lab::find($id);
        $data = $request->all();
        $patient->update($data);
        return back()->with('success', 'Lab updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Lab::find($id);
        if (count($patient->invoices) || count($patient->reports) || count($patient->packageSales)) {
            return back()->with('error', 'Lab cannot deleted...');
        }
        $patient->delete();
        return redirect()->route('labs.index')->with('success', 'Patient Deletetd Successfully');
    }
}
