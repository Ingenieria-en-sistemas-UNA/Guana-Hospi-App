<?php

namespace App\Repositories;
use App\Procedures\Presents;

class PresentsRepositoryImp implements PresentsRepository
{
    protected $procedure;

    /**
     * PostRepository constructor.
     *
     * @param Presenta $presenta
     */
    public function __construct()
    {
        $this->procedure = new Presents();
    }

    public function all()
    {
        return $this->procedure->listPresents();
    }

    public function create(array $data)
    {
       return $this->procedure->createPresents($data);
    }

    public function update(array $data)
    {
        return $this->procedure->updatePresents($data);
    }

    public function delete($id)
    {
        return $this->procedure->deletePresents($id);
    }

    public function find($id)
    {
        return 'BUSCAR PRESENTA CON EL ID' . $id;
    }
}

