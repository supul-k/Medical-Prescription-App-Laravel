<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index(){
        return view('login');
    }

    function registration(){
       return view('registration');
    }

    function validate_registration(Request $request){
        $request -> validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'DOB'       => 'required',
            'address'   => 'required',
            'contact_no'=> 'required|max:10',
            'type'     => 'required',
            'password'  => 'required|min:4'
        ]);

        $data = $request->all();

        User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'DOB'       => $data['DOB'],
            'address'   => $data['address'],
            'contact_no'=> $data['contact_no'],
            'type'     => $data['type'],
            'password'  => Hash::make($data['password'])
        ]);     

        return redirect('login')->with('success','Registration Completed, now you can login');
    }

    function validate_login(Request $request){
        $request -> validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);

        $credentials = $request->only('email','password');

        $email = $request->only('email');
        $type = DB::table("users")
            ->select("type")
            ->where("email", "=", $email)
            ->get();

        $type = collect($type)->map(function($x){ return (array) $x; })->toArray(); 

        foreach ($type as $ty) {
            
            if($ty['type'] == '1'){

                if(Auth::attempt($credentials)){
                    return redirect('dashboard');
                }

            }elseif($ty['type'] == '2'){

                if(Auth::attempt($credentials)){
                    return redirect('adminboard');
                }

            }

            return redirect('login')->with('success','Login details are not valid');
        }

        
    }

    function dashboard(){
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect('login')->with('success','You are not allowed to access');
    }

    function adminboard(){
        if(Auth::check()){
            return view('adminboard');
        }

        return redirect('login')->with('success','You are not allowed to access');
    }

    function logout(){

       Session()->flush();

       Auth::logout();

       return redirect('login');
    }
}
