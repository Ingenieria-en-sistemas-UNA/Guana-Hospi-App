<?php

namespace App\Repositories;
use App\Procedures\PatientUnity;

class PatientUnityRepositoryImp implements PatientUnityRepository
{
    protected $procedure;

    /**
     * PostRepository constructor.
     *
     * @param Paciente_unidad $paciente_unidad
     */
    public function __construct()
    {
        $this->procedure = new PatientUnity();
    }

    public function all()
    {
        return $this->procedure->listPatientUnity();
    }

    public function create(array $data)
    {
       return $this->procedure->createPatientUnity($data);
    }

    public function update(array $data)
    {
        return $this->procedure->updatePatientUnity($data);
    }

    public function delete($id)
    {
        return $this->procedure->deletePatientUnity($id);
    }

    public function find($id)
    {
        return 'BUSCAR UNIDAD PACIENTE CON EL ID' . $id;
    }
}
