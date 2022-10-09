<?php

namespace App\Http\Controllers;

use App\Models\Fine;
use App\Http\Requests\StoresettingsRequest;
use App\Http\Requests\UpdatesettingsRequest;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('book.fines',['data' => Fine::latest()->first()]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesettingsRequest  $request
     * @param  \App\Models\settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesettingsRequest $request)
    {
        $setting = Fine::latest()->first();
        $setting->return_days = $request->return_days;
        $setting->fine = $request->fine;
        $setting->save();
        return redirect()->route('fine');
    }
}
