<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/loadDatawarehouse', 'HomeController@loadDatawarehouse')->name('datawarehouse');

Route::get('/cleanDatawarehouse', 'HomeController@CleanDatawarehouse')->name('clean_datawarehouse');

Route::get('/activities', 'ActivitiesController@index')->name('activities');

Route::resource('doctors', 'DoctorController');

Route::resource('units', 'UnityController');

Route::resource('patients', 'PatientController');

Route::resource('diseases', 'DiseaseController');

Route::resource('specialities', 'SpecialtyController');

Route::resource('users', 'UsersController');

