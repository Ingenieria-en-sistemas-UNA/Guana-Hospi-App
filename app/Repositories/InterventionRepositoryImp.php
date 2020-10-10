<?php

namespace App\Repositories;
use App\Intervenciones;
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
        $data = $this->procedure->listIntervention();
        return Intervenciones::hydrate($data);

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
        return 'BUSCAR UNA MEDICO UNIDAD CON EL ID' . $id;
    }
}