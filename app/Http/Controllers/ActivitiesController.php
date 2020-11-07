<?php

namespace App\Http\Controllers;

use App\Repositories\ActivitiesRepository;

class ActivitiesController extends Controller
{
     /** @var ActivitiesRepository */
     private $repository;

     public function __construct(ActivitiesRepository $repository)
     {
         $this->middleware(['auth', 'check_role:Administrador']);
         $this->repository = $repository;
     }

     /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function index()
     {
         $activities = $this->repository->all();
         return view('pages.activities.index', compact('activities'));
     }

}
