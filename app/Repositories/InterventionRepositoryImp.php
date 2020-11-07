<?php

namespace App\Repositories;
use App\Procedures\Intervention;

class InterventionRepositoryImp implements InterventionRepository
{
    protected $procedure;

    /**
     * PostRepository constructor.
     *
     * @param Intervenciones $intervenciones
     */
    public function __construct()
    {
        $this->procedure = new Intervention();
    }

    public function all()
    {
        return $this->procedure->listIntervention();
    }

    public function create(array $data)
    {
       return $this->procedure->createIntervention($data);
    }

    public function update(array $data)
    {
        return $this->procedure->updateIntervention($data);
    }

    public function delete($id)
    {
        return $this->procedure->deleteIntervention($id);
    }

    public function find($id)
    {
        return $this->procedure->searchIntQuery($id);
    }
}
