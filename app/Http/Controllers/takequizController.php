<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Result;
class takequizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizs= Quiz::all();
        return view('pages.takequiz.index',compact('quizs'));
    }
    public function taketest(){
        $questions = Quiz::inRandomOrder()
        ->limit(10)
        ->get();
    $no_of_questions = '10';
    return view(
        'pages.takequiz.taketest',
        compact('questions', 'no_of_questions')
    );
}
public function posttest(Request $request){
    foreach($request->katopito as $key => $ass){
       
       $question = Quiz::find($key);
       if($ass == $question->correct ){
           $status = 'correct';
       }
       else{
        $status = 'incorrect';
       }
        Result::create([
            'question' => $question->question,
            'your_ans' => $ass,
            'correct' => $question->correct,
            'status' => $status,
            'user_id' => auth()->user()->id
        ]);

    }
    return redirect()->route('getresult');
}
public function getresult(){
    $result = Result::where('user_id',auth()->user()->id)->latest()->get();
    return view('pages.takequiz.result',compact('result'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
