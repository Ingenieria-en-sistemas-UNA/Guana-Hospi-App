<?php

namespace App\Repositories;
use App\Medico;
use App\Procedures\DoctorUnity;

class DoctorUnityRepositoryImp implements DoctorUnityRepository
{
    protected $procedure;

    /** 
     * PostRepository constructor.
     *
     * @param DoctorUnity $DoctorUnity
     */
    public function __construct()
    {
        $this->procedure = new DoctorUnity();
    }

    public function all()
    {
        $data = $this->procedure->listDoctorUnity();
        return DoctorUnity::hydrate($data);

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