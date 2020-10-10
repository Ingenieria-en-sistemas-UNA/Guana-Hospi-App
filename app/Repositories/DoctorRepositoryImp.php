<?php

namespace App\Repositories;
use App\Medico;
use App\Procedures\Doctor;

class DoctorRepositoryImp implements DoctorRepository
{
    protected $procedure;

    /** 
     * PostRepository constructor.
     *
     * @param Doctor $doctor
     */
    public function __construct()
    {
        $this->procedure = new Doctor();
    }

    public function all()
    {
        $data = $this->procedure->listDoctor();
        return Doctor::hydrate($data);

    }

    public function create(array $data)
    {
       return $this->procedure->createDoctor($data);
    }

    public function update(array $data)
    {
        return $this->procedure->updateDoctor($data);
    }

    public function delete($id)
    {
        return $this->procedure->deleteDoctor($id);
    }

    public function find($id)
    {
        return 'BUSCAR UNA MEDICO CON EL ID' . $id;
    }
}