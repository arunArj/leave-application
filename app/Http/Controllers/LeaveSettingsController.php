<?php

namespace App\Http\Controllers;

use App\Models\LeaveSettings;
use App\Http\Requests\StoreLeaveSettingsRequest;
use App\Http\Requests\UpdateLeaveSettingsRequest;
use App\Http\Resources\V1\LeaveSettingsResource;

class LeaveSettingsController extends Controller
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
     * @param  \App\Http\Requests\StoreLeaveSettingsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLeaveSettingsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LeaveSettings  $leaveSettings
     * @return \Illuminate\Http\Response
     */
    public function show(LeaveSettings $leaveSettings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LeaveSettings  $leaveSettings
     * @return \Illuminate\Http\Response
     */
    public function edit(LeaveSettings $leaveSettings)
    {
        // /  $leaveSettings = new LeaveSettingsResource($leaveSettings);
        return view('settings.settings_edit',compact(['leaveSettings']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLeaveSettingsRequest  $request
     * @param  \App\Models\LeaveSettings  $leaveSettings
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLeaveSettingsRequest $request, LeaveSettings $leaveSettings)
    {
        $leaveSettings = $leaveSettings->update($request->all());
        return redirect()->back()->with('success','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LeaveSettings  $leaveSettings
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveSettings $leaveSettings)
    {
        //
    }
}
