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

//Enfermedades
Route::get('/disease', 'DiseaseController@index')->name('disease');
Route::post('/disease/create', 'DiseaseController@store')->name('disease');

//Intervenciones
Route::get('/intervention', 'interventionController@index')->name('intervention');
Route::post('/intervention/create', 'InterventionController@store')->name('intervention');
Route::get('/intervention/type', 'interventionTypeController@index')->name('interventiontype');
Route::post('/intervention/type/create', 'InterventionTypeController@store')->name('interventiontype');

//Paciente
Route::get('/patient', 'PatientController@index')->name('patient');
Route::post('/patient/create', 'PatientController@store')->name('patient');
Route::get('/patient/unity', 'PatientUnityController@index')->name('patientunity');
Route::post('/patient/unity/create', 'PatientUnityController@store')->name('patientunity');

//Presenta
Route::get('/presents', 'PresentsController@index')->name('presents');
Route::post('/presents/create', 'PresentsController@store')->name('presents');

//Consulta
Route::get('/query', 'QueryController@index')->name('query');
Route::post('/query/create', 'QueryController@store')->name('query');

//Especialidad
Route::get('/specialty', 'SpecialtyController@index')->name('specialty');
Route::post('/specialty/create', 'SpecialtyController@store')->name('specialty');

//padece
Route::get('/suffers', 'SuffersController@index')->name('suffers');
Route::post('/suffers/create', 'SuffersController@store')->name('suffers');

//sintoma
Route::get('/sympton', 'SymptonController@index')->name('sympton');
Route::post('/sympton/create', 'SymptonController@store')->name('sympton');

//Unidad
Route::get('/unity', 'UnityController@index')->name('unity');
Route::post('/unity/create', 'UnityController@store')->name('unity');
