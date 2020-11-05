<?php

namespace App\Repositories;
use App\Procedures\InterventionType;

class InterventionTypeRepositoryImp implements InterventionTypeRepository
{
    protected $procedure;

    /**
     * PostRepository constructor.
     *
     * @param TipoIntervencion $tipoIntervencion
     */
    public function __construct()
    {
        $this->procedure = new InterventionType();
    }

    public function all()
    {
        return $this->procedure->listInterventionType();
    }

    public function create(array $data)
    {
       return $this->procedure->createInterventionType($data);
    }

    public function update(array $data)
    {
        return $this->procedure->updateInterventionType($data);
    }

    public function delete($id)
    {
        return $this->procedure->deleteInterventionType($id);
    }

    public function find($id)
    {
        return $this->procedure->getInterventionById($id);
    }
}
