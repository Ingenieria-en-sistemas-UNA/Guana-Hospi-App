<?php

namespace App\Repositories;
use App\Procedures\SpecialtyDoctor;

class SpecialtyDoctorRepositoryImp implements SpecialtyDoctorRepository
{
    protected $procedure;

    /**
     * PostRepository constructor.
     *
     * @param Medico_especialidad $medico_Especialidad
     */
    public function __construct()
    {
        $this->procedure = new SpecialtyDoctor();
    }

    public function all()
    {
        return $this->procedure->listSpecialtyDoctor();
    }

    public function create(array $data)
    {
       return $this->procedure->createSpecialtyDoctor($data);
    }

    public function update(array $data)
    {
        return $this->procedure->updateSpecialtyDoctor($data);
    }

    public function delete($id)
    {
        return $this->procedure->deleteSpecialtyDoctor($id);
    }

    public function find($id)
    {
        return 'BUSCAR ESPECIALIDAD DE DOCTOR CON EL ID' . $id;
    }
}
