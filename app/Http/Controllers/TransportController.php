<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Vans;
use App\Models\Transport;
use App\Models\Drivers;
use App\User;


class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transports = Transport::all();
        $vans = Vans::all();
        $drivers = Drivers::all();


        return view('transport.studenttransport',[
            'vans' => $vans,
            'drivers' => $drivers,
            'transports' => $transports,
            'students' => User::where('user_type','student')->orderBy('name', 'asc')->get(),

        ]);
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transport = Transport::all();
        $vans = Vans::all();
        $drivers = Drivers::all();


        return view('transport.studenttransport',[
            'vans' => $vans,
            'drivers' => $drivers,
            'transports' => $transport,
            'students' => User::where('user_type','student')->orderBy('name', 'asc')->get(),

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
        $request -> validate(['van' => 'required',
        'driver' => 'required',
        'student' => 'required',
        'pickupshift' => 'required',
        'dropshift' => 'required'

    ]);

       
        $data = new Transport;
        $data -> van = $request -> van;
        $data -> driver = $request -> driver;
        $data -> student = $request -> student;
        $data -> pickupshift = $request -> pickupshift;
        $data -> dropshift = $request -> dropshift;

      
        $data -> save();

        return redirect()->route('transport.index');
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $transport = Transport::find($request->id);
        $transport->delete();
        echo "<script> alert('Transport hase been deleted successfully!'); </script>";
        return redirect() ->route('transport.index');
    }
}
