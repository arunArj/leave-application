<?php

namespace App\Http\Controllers;

use App\Models\EmployeeDetails;
use App\Http\Requests\StoreEmployeeDetailsRequest;
use App\Http\Requests\UpdateEmployeeDetailsRequest;

class EmployeeDetailsController extends Controller
{
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeDetailsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeDetailsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeDetails  $employeeDetails
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeDetails $employeeDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeDetails  $employeeDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeDetails $employeeDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeDetailsRequest  $request
     * @param  \App\Models\EmployeeDetails  $employeeDetails
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeDetailsRequest $request, EmployeeDetails $employeeDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeDetails  $employeeDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeDetails $employeeDetails)
    {
        //
    }
}
