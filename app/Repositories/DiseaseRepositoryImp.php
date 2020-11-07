<?php

namespace App\Repositories;
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
        return $this->procedure->listDisease();
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
        return $this->procedure->getById($id);
    }
    public function findDisPacientId($id)
    {
        return $this->procedure->getByPacientId($id);
    }
}
