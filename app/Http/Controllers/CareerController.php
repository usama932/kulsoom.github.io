<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorecareerRequest;
use App\Models\Career;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('career.index', [
            'careers' => Career::where('id','>',0)->orderBy('name', 'asc')->get(),
        ]);

    }

    public function apply($id)
    {
        echo $id;
        
        return view('career');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StorecareerRequest $request)
    {
        $request->validated();
        // $request->resume->store('resume');
        $path = $request->resume->store('resume');
        $resume_link = $path;
        Career::create([
            "name" => $request->name,
            "jobid" =>$request('id'),
            "email" => $request->email,
            "phone" => $request->phone,
            "position" => $request->position,
            "message" => $request->message,
            "resume_link" => $resume_link,
        ]);

        echo "<script> alert('Your career application has been sent successfully!'); </script>";
        return view('career');
        //return redirect()->route('career');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Career::find($request->id)->delete();
        return redirect()->route('career.index');
    }

    public function getDownload(Request $request)
    {
        //PDF file is stored under project/public/download/info.pdf
        // $file= public_path(). "/storage/resume/J8xjgkAU0Zv7mlzi0e4C8eO3tNEuu42MKM7s0dy5.doc";
        // dd($file);

        // $headers = array(
        //       'Content-Type: application/doc',
        //     );

        // return response()->download($file, 'filename.pdf', $headers);


        $link = Career::find($request->id) ->resume_link;
        return Storage::download($link);
    }


}
