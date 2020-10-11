<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/people', 'PeopleController@index')->name('people');
Route::post('/people/create', 'PeopleController@store')->name('people');
Route::post('/disease/create', 'DiseaseController@store')->name('disease');
Route::post('/doctor/create', 'DoctorController@store')->name('doctor');
Route::post('/doctor/unity/create', 'DoctorUnityController@store')->name('doctorunity');
Route::post('/intervention/create', 'InterventionController@store')->name('intervention');
Route::post('/intervention/type/create', 'InterventionTypeController@store')->name('interventiontype');
Route::post('/patient/create', 'PatientController@store')->name('patient');
