<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Models\Appliedjob;
use App\Http\Requests\StorecareerRequest;
use App\Models\Career;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;



class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Jobs::all();
        return view('jobportal.index',['jobs' => $jobs]);
    }

    public function showAll()
    {
        $jobs = Jobs::all();
        return view('jobposts',['jobs' => $jobs]);
    }

    public function applyjob($id)
    {
        return view('applyjob', ['id'=>$id]);
    }

    public function searchData(Request $request)
    {

        $searchReq = $request->searchjob;
        $jobs = Jobs::where('jobname','LIKE',"%$searchReq%")->orWhere('jobtype','LIKE',"%$searchReq%")->orWhere('position','LIKE',"%$searchReq%")->get();

      
        return view('jobposts',['jobs' => $jobs, 'searchReq' => $searchReq]);
        
    }

    public function filterFaculty()
    {

        //$searchReq = $request->search;
        $jobs = Jobs::where('position','LIKE',"%Faculty%")->get();
        return view('jobposts',['jobs' => $jobs]);
    
    }

    public function filterAdmin()
    {

        //$searchReq = $request->search;
        $jobs = Jobs::where('position','LIKE',"%Admin%")->get();
        return view('jobposts',['jobs' => $jobs]);
    
    }

    public function filterAssistant()
    {

        $jobs = Jobs::where('position','LIKE',"%Assistant%")->get();

        return view('jobposts',['jobs' => $jobs]);
    
    }

    public function filterFulltime()
    {

        //$searchReq = $request->search;
        $jobs = Jobs::where('jobtype','LIKE',"%Fulltime%")->get();
        return view('jobposts',['jobs' => $jobs]);
    
    }

    public function filterParttime()
    {

        //$searchReq = $request->search;
        $jobs = Jobs::where('jobtype','LIKE',"%Parttime%")->get();
        return view('jobposts',['jobs' => $jobs]);
    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('jobportal.index');

    }


    public function allAppliedJobs()
    {
        $appliedjobs = Appliedjob::join('jobs', 'appliedjobs.jobid', '=' , 'jobs.id')
        ->get(['appliedjobs.*', 'jobs.jobname as jobname','jobs.salary as salary', 'jobs.details as jobdetails', 'jobs.position as jobposition', 'jobs.jobtype as jobtype']);

        // $appliedjobs = DB::table('appliedjobs')
        // ->join('jobs','appliedjobs.jobid','jobs.id')
        // ->select('jobs.*','appliedjobs.id as appliedid')
        // ->where('appliedjobs.jobid','jobs.id')
        // ->get();

      


        return view('career.index',['appliedjobs'=>$appliedjobs]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate(['jobname' => 'required',
        'details' => 'required',
        'salary' => 'required',
        'jobtype' => 'required',
        'position' => 'required'
    ]);

       
        $data = new Jobs;
        $data -> jobname = $request -> jobname;
        $data -> details = $request -> details;
        $data -> salary = $request -> salary;
        $data -> jobtype = $request -> jobtype;
        $data -> position = $request -> position;

        $data -> save();

        return redirect()->route('jobs.index');
    }

    public function applied(Request $request)
    {
        $request -> validate(['name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'jobid' => 'required',

    ]);
    $path = $request->resume->store('resume');
    $resume_link = $path;
    $data = new Appliedjob;
        $data -> name = $request -> name;
        $data -> email = $request -> email;
        $data -> phone = $request -> phone;
        $data -> position = $request -> position;
        $data -> jobid = $request -> jobid;
        $data -> message = $request -> message;
        $data -> message = $request -> message;
        $data -> resume_link = $resume_link;



        $data -> save();

        echo "<script> alert('Your career application has been sent successfully!'); </script>";
        return view('index');

    

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
        $jobs = Jobs::find($request->id);
        $jobs->delete();
        echo "<script> alert('Your Message hase been deleted successfully!'); </script>";
        return redirect() ->route('jobs.index');
    }

    public function deleteApplication(Request $request)
    {
        $appliedjobs = Appliedjob::find($request->id);
        $appliedjobs->delete();
        echo "<script> alert('Your Message hase been deleted successfully!'); </script>";
        return redirect() ->route('career.index');
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


        $link = Appliedjob::find($request->id) ->resume_link;
        return Storage::download($link);
    }
}
