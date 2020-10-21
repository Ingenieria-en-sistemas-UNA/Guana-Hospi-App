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

//Personas
Route::get('/people', 'PeopleController@index')->name('people');
Route::post('/people/create', 'PeopleController@store')->name('people');
Route::post('/people/update', 'PeopleController@update')->name('people');
Route::delete('/people/delete', 'PeopleController@destroy')->name('people');

//Enfermedades
Route::get('/disease', 'DiseaseController@index')->name('disease');
Route::post('/disease/create', 'DiseaseController@store')->name('disease');
Route::post('/disease/update', 'DiseaseController@update')->name('disease');
Route::delete('/disease/delete', 'DiseaseController@destroy')->name('disease');

//Medico
Route::get('/doctor', 'DoctorController@index')->name('doctor');
Route::post('/doctor/create', 'DoctorController@store')->name('doctor');
Route::post('/doctor/update', 'DoctorController@update')->name('doctor');
Route::delete('/doctor/delete', 'DoctorController@destroy')->name('doctor');

//Medico Unidad
Route::get('/doctor/unity', 'DoctorUnityController@index')->name('doctorunity');
Route::post('/doctor/unity/create', 'DoctorUnityController@store')->name('doctorunity');
Route::post('/doctor/unity/update', 'DoctorUnityController@update')->name('doctorunity');
Route::delete('/doctor/unity/delete', 'DoctorUnityController@destroy')->name('doctorunity');

//Medico Especialidad
Route::get('/specialty/doctor', 'SpecialtyDoctorController@index')->name('specialtydoctor');
Route::post('specialty/doctor/create', 'SpecialtyDoctorController@store')->name('specialtydoctor');
Route::post('specialty/doctor/update', 'SpecialtyDoctorController@update')->name('specialtydoctor');
Route::delete('specialty/doctor/delete', 'SpecialtyDoctorController@destroy')->name('specialtydoctor');

//Intervenciones
Route::get('/intervention', 'interventionController@index')->name('intervention');
Route::post('/intervention/create', 'InterventionController@store')->name('intervention');
Route::post('/intervention/update', 'InterventionController@update')->name('intervention');
Route::delete('/intervention/delete', 'InterventionController@destroy')->name('intervention');

//tipo de intervencion
Route::get('/intervention/type', 'interventionTypeController@index')->name('interventiontype');
Route::post('/intervention/type/create', 'InterventionTypeController@store')->name('interventiontype');
Route::post('/intervention/type/update', 'InterventionTypeController@update')->name('interventiontype');
Route::delete('/intervention/type/delete', 'InterventionTypeController@destroy')->name('interventiontype');

//Paciente
Route::get('/patient', 'PatientController@index')->name('patient');
Route::post('/patient/create', 'PatientController@store')->name('patient');
Route::post('/patient/update', 'PatientController@update')->name('patient');
Route::delete('/patient/delete', 'PatientController@destroy')->name('patient');

//paciente unidad
Route::get('/patient/unity', 'PatientUnityController@index')->name('patientunity');
Route::post('/patient/unity/create', 'PatientUnityController@store')->name('patientunity');
Route::post('/patient/unity/update', 'PatientUnityController@update')->name('patientunity');
Route::delete('/patient/unity/delete', 'PatientUnityController@destroy')->name('patientunity');

//Presenta
Route::get('/presents', 'PresentsController@index')->name('presents');
Route::post('/presents/create', 'PresentsController@store')->name('presents');
Route::post('/presents/update', 'PresentsController@update')->name('presents');
Route::delete('/presents/delete', 'PresentsController@destroy')->name('presents');

//Consulta
Route::get('/query', 'QueryController@index')->name('query');
Route::post('/query/create', 'QueryController@store')->name('query');
Route::post('/query/update', 'QueryController@update')->name('query');
Route::delete('/query/delete', 'QueryController@destroy')->name('query');

//Especialidad
Route::get('/specialty', 'SpecialtyController@index')->name('specialty');
Route::post('/specialty/create', 'SpecialtyController@store')->name('specialty');
Route::post('/specialty/update', 'SpecialtyController@update')->name('specialty');
Route::delete('/specialty/delete', 'SpecialtyController@destroy')->name('specialty');

//padece
Route::get('/suffers', 'SuffersController@index')->name('suffers');
Route::post('/suffers/create', 'SuffersController@store')->name('suffers');
Route::post('/suffers/update', 'SuffersController@update')->name('suffers');
Route::delete('/suffers/delete', 'SuffersController@destroy')->name('suffers');

//sintoma
Route::get('/sympton', 'SymptonController@index')->name('sympton');
Route::post('/sympton/create', 'SymptonController@store')->name('sympton');
Route::post('/sympton/update', 'SymptonController@update')->name('sympton');
Route::delete('/sympton/delete', 'SymptonController@destroy')->name('sympton');

//Unidad
Route::get('/unity', 'UnityController@index')->name('unity');
Route::post('/unity/create', 'UnityController@store')->name('unity');
Route::post('/unity/update', 'UnityController@update')->name('unity');
Route::delete('/unity/delete', 'UnityController@destroy')->name('unity');
