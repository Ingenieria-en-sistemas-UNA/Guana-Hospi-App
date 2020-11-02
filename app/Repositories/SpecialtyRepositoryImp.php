<?php

namespace App\Repositories;
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
        return $this->procedure->listSpecialty();
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
        return $this->procedure->getById($id);
    }

    public function findByDoctorId($id)
    {
        return $this->procedure->listSpecialtyByDoctorId($id);
    }
}
