<?php

namespace App\Repositories;
use App\Procedures\Doctor;
use Illuminate\Support\Facades\Auth;

class DoctorRepositoryImp implements DoctorRepository
{
    protected $procedure;

    public function __construct()
    {
        $this->procedure = new Doctor();
    }

    public function all()
    {
        return $this->procedure->listDoctor();
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
        return $this->procedure->getDoctorById($id);
    }
}
