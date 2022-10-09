<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Storage;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $obj = Contact::all();
        // return view ('contact.index', compact('obj'));
        // return view('contact.index', [
        //     'contacts' => Contact::where('id','>',0)->get(),
        // ]);
        $contact = Contact::all();
        return view('contact.index',['contacts' => $contact]);
      //  return view ('contact.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate(['name' => 'required',
        'email' => 'required',
        'message' => 'required']);

        // Contact::create([
        //     "name" => $request->name,
        //     "email" => $request->email,
        //     "phone" => $request->phone,
        //     "message" => $request->message,
            
        // ]);
       // return redirect()->route('contact');
        $data = new Contact;
        $data -> name = $request -> name;
        $data -> email = $request -> email;
        $data -> phone = $request -> phone;
        $data -> message = $request -> message;
        $data -> save();
        echo "<script> alert('Your Message hase been sent successfully!'); </script>";
        return view('contact');
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
        
      // Contact::find($request->id)->delete();
        $contact = Contact::find($request->id);
        $contact->delete();
        echo "<script> alert('Your Message hase been deleted successfully!'); </script>";
        return redirect() ->route('contact.index');
       }
}
