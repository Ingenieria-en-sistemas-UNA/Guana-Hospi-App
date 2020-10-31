<?php

namespace App\Http\Controllers;

use App\Repositories\DWStatisticsRepository;
use App\Repositories\DWFillRepository;

class HomeController extends Controller
{
    /** @var DWStatisticsRepository */
    private $repositoryStatistics;

    /** @var DWFillRepository */
    private $repositoryDatawarehouse;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DWStatisticsRepository $repositoryStatistics, DWFillRepository $repositoryDatawarehouse)
    {
        $this->middleware('auth');
        $this->repositoryStatistics = $repositoryStatistics;
        $this->repositoryDatawarehouse = $repositoryDatawarehouse;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $units = $this->repositoryStatistics->unitySta();
        $diseases = $this->repositoryStatistics->diseaseSta();
        $doctors = $this->repositoryStatistics->doctorInterventionSta();
        $tipoIntervenciones = $this->repositoryStatistics->interventionTypeSta();
        return view('pages.home', compact('doctors', 'diseases', 'units', 'tipoIntervenciones'));
    }

    public function loadDatawarehouse()
    {
        $this->repositoryDatawarehouse->fill();
        return redirect('/')->with('success', 'Se cargaron los datos del DWH exitosamente!');;
    }

    public function CleanDatawarehouse()
    {
        $this->repositoryDatawarehouse->delete();
        return redirect('/')->with('success', 'Se eliminaron los datos del DWH exitosamente!');;
    }
}
