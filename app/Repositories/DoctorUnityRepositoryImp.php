<?php

namespace App\Repositories;
use App\Unidad_medico;
use App\Procedures\DoctorUnity;

class DoctorUnityRepositoryImp implements DoctorUnityRepository
{
    protected $procedure;

    /** 
     * PostRepository constructor.
     *
     * @param Unidad_medico $unidad_medico
     */
    public function __construct()
    {
        $this->procedure = new DoctorUnity();
    }

    public function all()
    {
        $data = $this->procedure->listDoctorUnity();
        return Unidad_medico::hydrate($data);

    }

    public function create(array $data)
    {
       return $this->procedure->createDoctorUnity($data);
    }

    public function update(array $data)
    {
        return $this->procedure->updateDoctorUnity($data);
    }

    public function delete($id)
    {
        return $this->procedure->deleteDoctorUnity($id);
    }

    public function find($id)
    {
        return 'BUSCAR UNA MEDICO UNIDAD CON EL ID' . $id;
    }
}