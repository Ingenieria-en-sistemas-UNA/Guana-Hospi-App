<?php

namespace App\Repositories;
use App\Especialidad;
use App\Procedures\Specialty;

class SpecialtyRepositoryImp implements SpecialtyRepository
{
    protected $procedure;

    /**
     * PostRepository constructor.
     *
     * @param Especialidad $especialidad
     */
    public function __construct()
    {
        $this->procedure = new Specialty();
    }

    public function all()
    {
        $data = $this->procedure->listSpecialty();
        return Especialidad::hydrate($data);

    }

    public function create(array $data)
    {
       return $this->procedure->createSpecialty($data);
    }

    public function update(array $data)
    {
        return $this->procedure->updateSpecialty($data);
    }

    public function delete($id)
    {
        return $this->procedure->deleteSpecialty($id);
    }

    public function find($id)
    {
        return 'BUSCAR ESPECIALIDAD CON EL ID' . $id;
    }
}