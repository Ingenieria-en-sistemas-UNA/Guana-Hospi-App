<?php

namespace App\Repositories;
use App\Procedures\DWStatistics;

class DWStatisticsRepositoryImp implements DWStatisticsRepository
{
    protected $procedure;

    /**
     * PostRepository constructor.
     *
     * @param 
     */
    public function __construct()
    {
        $this->procedure = new DWStatistics();
    }

    public function diseaseSta()
    {
        return $this->procedure->topDisease();
    }

    public function unitySta()
    {
       return $this->procedure->topUnity();
    }

    public function doctorInterventionSta()
    {
       return $this->procedure->topDoctorIntervention();
    }

    public function interventionTypeSta()
    {
       return $this->procedure->topInterventionType();
    }
}