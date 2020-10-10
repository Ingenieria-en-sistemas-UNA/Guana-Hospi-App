<?php

namespace App\Repositories;
use App\Enfermedad;
use App\Procedures\Disease;

class DiseaseRepositoryImp implements DiseaseRepository
{
    protected $procedure;

    /** 
     * PostRepository constructor.
     *
     * @param Enfermedad $enfermedad
     */
    public function __construct()
    {
        $this->procedure = new Disease();
    }

    public function all()
    {
        $data = $this->procedure->listDisease();
        return Disease::hydrate($data);

    }

    public function create(array $data)
    {
       return $this->procedure->createDisease($data);
    }

    public function update(array $data)
    {
        return $this->procedure->updateDisease($data);
    }

    public function delete($id)
    {
        return $this->procedure->deleteDisease($id);
    }

    public function find($id)
    {
        return 'BUSCAR UNA ENFERMEDAD CON EL ID' . $id;
    }
}