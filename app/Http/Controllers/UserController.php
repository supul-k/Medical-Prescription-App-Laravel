<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Return_;

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

    function logout(){
       
    }
}
