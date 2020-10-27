<?php

namespace App\Repositories;
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
        return $this->procedure->listUnity();
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
        return $this->procedure->getUnityById($id);
    }
}
