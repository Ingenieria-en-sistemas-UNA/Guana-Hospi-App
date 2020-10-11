<?php

namespace App\Repositories;
use App\Consulta;
use App\Procedures\Query;

class QueryRepositoryImp implements QueryRepository
{
    protected $procedure;

    /**
     * PostRepository constructor.
     *
     * @param Consulta $consulta
     */
    public function __construct()
    {
        $this->procedure = new Query();
    }

    public function all()
    {
        $data = $this->procedure->listQuery();
        return Consulta::hydrate($data);

    }

    public function create(array $data)
    {
       return $this->procedure->createQuery($data);
    }

    public function update(array $data)
    {
        return $this->procedure->updateQuery($data);
    }

    public function delete($id)
    {
        return $this->procedure->deleteQuery($id);
    }

    public function find($id)
    {
        return 'BUSCAR CONSULTA CON EL ID' . $id;
    }
}