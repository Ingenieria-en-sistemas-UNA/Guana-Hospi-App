<?php

namespace App\Repositories;
use App\Paciente;
use App\Procedures\Patient;

class PatientRepositoryImp implements PatientRepository
{
    protected $procedure;

    /** 
     * PostRepository constructor.
     *
     * @param Paciente $paciente
     */
    public function __construct()
    {
        $this->procedure = new Patient();
    }

    public function all()
    {
        $data = $this->procedure->listPatient();
        return Paciente::hydrate($data);

    }

    public function create(array $data)
    {
       return $this->procedure->createPatient($data);
    }

    public function update(array $data)
    {
        return $this->procedure->updatePatient($data);
    }

    public function delete($id)
    {
        return $this->procedure->deletePatient($id);
    }

    public function find($id)
    {
        return 'BUSCAR UNA MEDICO UNIDAD CON EL ID' . $id;
    }
}