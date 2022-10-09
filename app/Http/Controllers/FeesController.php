<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Feesmodel;
use App\Models\MyClass;

class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feesmodels = Feesmodel::all();
        $my_classes = MyClass::all();

        return view('studentmanage.feesindex',[
            'feesmodels' => $feesmodels,
            'my_classes' => $my_classes

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $feesmodels = Feesmodel::all();
        $my_classes = MyClass::all();

        return view('studentmanage.feesindex',[
            'feesmodels' => $feesmodels,
            'my_classes' => $my_classes

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate(['class' => 'required',
        'fees' => 'required'

    ]);

        $fees = new Feesmodel;
        $fees -> class = $request -> class;
        $fees -> fees = $request -> fess;
    
      
        $fees -> save();

        return redirect()->route('fees.index');
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
    public function destroy($id)
    {
        //
    }
}
