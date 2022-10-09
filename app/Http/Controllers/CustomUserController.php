<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomUser;
use Illuminate\Support\Facades\Storage;
use Hash;
use Session;


class CustomUserController extends Controller
{
    public function login()
    {
        return view('customers.login');
    }

    public function register()
    {
        return view('customers.register');
    }

    public function registerUser(Request $request){

        $request -> validate([

            'name' => 'required',
            'email' => 'required|email|unique:custom_users',
            'password' =>'required|min:4|max:12'
        ]);

        $data = new CustomUser;
        $data -> name = $request -> name;
        $data -> email = $request -> email;
        $data -> phone = $request -> phone;
        $data -> password = Hash::make($request -> password);
        $data -> zip = $request -> zip;
        $data -> address = $request -> address;
        $data -> adtype = $request -> adtype;
        $data -> save();
        echo "<script> alert('Registeration completed successfully!'); </script>";
        return view('customers.register');
    }
    public function loginUser(Request $request){

        $request -> validate([
            'email' => 'required|email',
            'password' =>'required|min:4|max:12'
        ]);

        $data = CustomUser::where('email' ,'=', $request -> email) ->first();

        if($data){
            if(Hash::check($request->password, $data->password))
            {

                $request->session()->put('loginname',$data->name);
                $request->session()->put('loginaddress',$data->address);
                $request->session()->put('loginphone',$data->phone);


                $request->session()->put('loginid',$data->id);
                echo "<script> alert('Logged in successfully!'); </script>";

                return redirect() -> route('index');
            }
            else{
                echo "<script> alert('Log in failed!'); </script>";

                return view('customers.login');

            }
        }
        else{
            echo "<script> alert('Log in failed!'); </script>";

            return view('customers.login');

        }
    }

    public function logout(){
        if(Session::has('loginid'))
        {
            Session::pull('loginid');
            return redirect() -> route('index');
        }
    }
}
