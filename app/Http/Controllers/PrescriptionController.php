<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prescription;

class PrescriptionController extends Controller
{
    function upload(){
        return view('upload');
    }

    function showprescription(){
       return view('showprescription');
    }


    function validate_upload(Request $request){

        $request -> validate([

            'note'      => 'required',
            'address'   => 'required',
            'time'      => ['required','integer',
                function($attribute,$value,$fail){
                    if($value %2 !== 0){
                        $fail($attribute."is invalid");
                    }
                }
            ]
            // 'photo'     => 'required|mimes:jpeg,png,jpg,gif,JPEG,PNG,JPG,GIF'

        ]);

        $data = $request->all();

        $fileName = time().$request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('images', $fileName, 'public');
        $requestData["photo"] = '/storage/'.$path;

        Prescription::create([
            'note'      => $data['note'],
            'address'     => $data['address'],
            'time'       => $data['time'],
            'photo'   => $fileName
        ]);

        return redirect('dashboard')->with('success','Uploaded Successfully, Wait for the response');

    }

    function validate_show(){
        $prescriptions = Prescription::all();
        return view ('showprescription')->with('prescriptions', $prescriptions);
    }
}
