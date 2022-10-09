<?php

namespace App\Http\Controllers;

use App\Models\book_issue;
use App\Http\Requests\Storebook_issueRequest;
use App\Http\Requests\Updatebook_issueRequest;
use App\Models\auther;
use App\Models\book;
use App\Models\fine;
use App\Models\student;
use App\User;
use \Illuminate\Http\Request;

class BookIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('book.issueBooks', [
            'books_issued' => book_issue::where('id','>=','1')->orderBy('id', 'asc')->get(), 
            'students' => User::where('user_type','student')->orderBy('name', 'asc')->get(),
            'books' => book::where('status','Y')->orderBy('name', 'asc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.issueBook_add', [
            'students' => User::where('user_type','student')->latest()->get(),
            'books' => book::where('status', 'Y')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storebook_issueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storebook_issueRequest $request)
    {
        $check = book_issue::where('student_id',$request->student_id)->where('book_id',$request->book_id)->get(); 
        if($check->count() <= 0){
        $issue_date = date('Y-m-d');
        $return_date = date('Y-m-d', strtotime("+" . (fine::latest()->first()->return_days) . " days"));
        $data = book_issue::create($request->validated() + [
            'student_id' => $request->student_id,
            'book_id' => $request->book_id,
            'issue_date' => $issue_date,
            'return_date' => $return_date,
            'issue_status' => 'N',
        ]);
        $data->save();
        $book = book::find($request->book_id);
        $book->status = 'N';
        $book->save();
        return redirect()->route('book_issued');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // calculate the total fine  (total days * fine per day)
        $book = book_issue::where('id',$id)->get()->first();
        $first_date = date_create($book->issue_date);
        $last_date = date_create($book->return_date);
        $return_date = date_create(date('Y-m-d'));
        $diff = date_diff($first_date, $last_date)->format('%a');
        $actual_diff = date_diff($first_date, $return_date)->format('%a');
        if( $diff < $actual_diff ){
            $fine = (fine::latest()->first()->fine * ($actual_diff -$diff));
        }
        else{
            $fine = 0;
        }
        return view('book.issueBook_edit', [
            'book' => $book,
            'fine' => $fine,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatebook_issueRequest  $request
     * @param  \App\Models\book_issue  $book_issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$fine)
    {
        // dd($request->all());
        $book = book_issue::find($id);
        $book->issue_status = 'Y';
        $book->return_day = now();
        $book->fine = $fine;
        $book->save();
        $bookk = book::find($book->book_id);
        $bookk->status= 'Y';
        $bookk->save();
        return redirect()->route('book_issued');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book_issue  $book_issue
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        book_issue::find($id)->delete();
        return redirect()->route('book_issued');
    }
}
