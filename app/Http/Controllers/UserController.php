<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
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
            'contact_no'       => 'required|max:10',
            'password'  => 'required|min:4'
        ]);

        $data = $request->all();

        User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'DOB'       => $data['DOB'],
            'address'   => $data['address'],
            'contact_no'=> $data['contact_no'],
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

        if(Auth::attempt($credentials)){
            return redirect('dashboard');
        }

        return redirect('login')->with('success','Login details are not valid');
    }

    function dashboard(){
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect('login')->with('success','You are not allowed to access');
    }

    function logout(){

       Session()->flush();

       Auth::logout();

       return redirect('login');
    }
}
