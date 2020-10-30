<?php

namespace App\Repositories;
use App\Procedures\RolesProvider;

class RolesRepositoryImp implements RolesRepository
{
    protected $procedure;

    /**
     * PostRepository constructor.
     *
     * @param Medico_especialidad $medico_Especialidad
     */
    public function __construct()
    {
        $this->procedure = new RolesProvider();
    }

    public function all()
    {
        return $this->procedure->listRoles();
    }

    public function create(array $data)
    {
       return $this->procedure->createRole($data);
    }

    public function update(array $data)
    {
        return $this->procedure->updateRole($data);
    }

    public function findById($id)
    {
        return $this->procedure->getById($id);
    }

    public function findByName($name)
    {
        return $this->procedure->getByName($name);
    }
}
