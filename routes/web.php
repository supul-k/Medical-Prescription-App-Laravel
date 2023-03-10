<?php

use App\Http\Controllers\PrescriptionController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UserController::class)->group(function(){

    Route::get('login','index')->name('login');

    Route::get('registration','registration')->name('registration');

    Route::get('logout','logout')->name('logout');

    Route::post('validate_registration', 'validate_registration')->name('user.validate_registration');

    Route::post('validate_login','validate_login')->name('user.validate_login');

    Route::get('dashboard','dashboard')->name('dashboard');

    Route::get('adminboard','adminboard')->name('adminboard');
});

Route::controller(PrescriptionController::class)->group(function(){

    Route::get('upload','upload')->name('upload');

    Route::get('showprescription','showprescription')->name('showprescription');

    Route::post('validate_upload','validate_upload')->name('prescription.validate_upload');

    Route::get('validate_show', 'validate_show')->name('prescription.validation_show');
    
});

