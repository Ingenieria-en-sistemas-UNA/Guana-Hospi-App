<?php

namespace App\Repositories;
use App\Sintoma;
use App\Procedures\Sympton;

class SymptonRepositoryImp implements SymptonRepository
{
    protected $procedure;

    /**
     * PostRepository constructor.
     *
     * @param Sintoma $sintoma
     */
    public function __construct()
    {
        $this->procedure = new Sympton();
    }

    public function all()
    {
        $data = $this->procedure->listSympton();
        return Sintoma::hydrate($data);

    }

    public function create(array $data)
    {
       return $this->procedure->createSympton($data);
    }

    public function update(array $data)
    {
        return $this->procedure->updateSympton($data);
    }

    public function delete($id)
    {
        return $this->procedure->deleteSympton($id);
    }

    public function find($id)
    {
        return 'BUSCAR SINTOMA CON EL ID' . $id;
    }
}