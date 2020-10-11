<?php

namespace App\Repositories;
use App\TipoIntervencion;
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
        $data = $this->procedure->listInterventionType();
        return TipoIntervencion::hydrate($data);

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
        return 'BUSCAR UN TIPO DE INTERVENCION UNIDAD CON EL ID' . $id;
    }
}