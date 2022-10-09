<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use Illuminate\Support\Facades\Storage;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admission = Admission::all();
        return view('admission.index',['admissions' => $admission]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admission');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Admission;
        $data -> stname = $request -> stname;
        $data -> email = $request -> email;
        $data -> phone = $request -> phone;
        $data -> class = $request -> class;
        $data -> father = $request -> father;
        $data -> mother = $request -> mother;
        $data -> previoussch = $request -> previoussch;
        $data -> leftyear = $request -> leftyear;
        $data -> info = $request -> info;


        $data -> save();
        echo "<script> alert('Your admision application has been sent successfully!'); </script>";
        return view('admission');  
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy(Request $request)
    {
        $admission = Admission::find($request->id);
        $admission->delete();
        return redirect()->route('admission.index');
    }
}
