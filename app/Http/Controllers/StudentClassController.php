<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\StudentClass;
use App\Models\MyClass;
use App\Models\Feesmodel;
use App\User;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_classes = StudentClass::all();
        $my_classes = MyClass::all();

        return view('studentmanage.classindex',[
            'student_classes' => $student_classes,
            'my_classes' => $my_classes,
            'students' => User::where('user_type','student')->orderBy('created_at', 'desc')->get(),

        ]);
    }

  


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student_classes = StudentClass::all();
        $my_classes = MyClass::all();

        return view('studentmanage.classindex',[
            'student_classes' => $student_classes,
            'my_classes' => $my_classes,
            'students' => User::where('user_type','student')->orderBy('created_at', 'desc')->get(),

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
        $request -> validate(['student' => 'required',
        'class' => 'required',
       

    ]);

       
        $data = new StudentClass;
        $data -> student = $request -> student;
        $data -> class = $request -> class;
    
      
        $data -> save();

        return redirect()->route('studentclass');
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
        $student_classes = StudentClass::find($request->id);
        $student_classes->delete();
        echo "<script> alert('Transport hase been deleted successfully!'); </script>";
        return redirect() ->route('studentclass');
    }


    //fees


    public function allFees()
    {
        $feesmodels = Feesmodel::all();
        $my_classes = MyClass::all();

        return view('studentmanage.feesindex',[
            'feesmodels' => $feesmodels,
            'my_classes' => $my_classes
            

        ]);
    }

    public function allFeesStore(Request $request)

    {

        $request -> validate(['fees' => 'required',
        'class' => 'required',
       

    ]);

       
        $data = new Feesmodel;
        $data -> fees = $request -> fees;
        $data -> class = $request -> class;
    
      
        $data -> save();

        return redirect()->route('allclassfees');
        
    }

    public function allFeesDelete(Request $request)
    {
        $feesmodels = Feesmodel::find($request->id);
        $feesmodels->delete();
        return redirect() ->route('allclassfees');
    }
}
