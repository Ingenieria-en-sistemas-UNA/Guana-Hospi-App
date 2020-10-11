<?php

namespace App\Repositories;
use App\Unidad;
use App\Procedures\Unity;

class UnityRepositoryImp implements UnityRepository
{
    protected $procedure;

    /**
     * PostRepository constructor.
     *
     * @param Unidad $snidad
     */
    public function __construct()
    {
        $this->procedure = new Unity();
    }

    public function all()
    {
        $data = $this->procedure->listUnity();
        return Unidad::hydrate($data);

    }

    public function create(array $data)
    {
       return $this->procedure->createUnity($data);
    }

    public function update(array $data)
    {
        return $this->procedure->updateUnity($data);
    }

    public function delete($id)
    {
        return $this->procedure->deleteUnity($id);
    }

    public function find($id)
    {
        return 'BUSCAR UNIDAD CON EL ID' . $id;
    }
}