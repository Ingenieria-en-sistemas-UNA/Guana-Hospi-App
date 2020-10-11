<?php

namespace App\Repositories;
use App\Padece;
use App\Procedures\Suffers;

class SuffersRepositoryImp implements SuffersRepository
{
    protected $procedure;

    /**
     * PostRepository constructor.
     *
     * @param Padece $padece
     */
    public function __construct()
    {
        $this->procedure = new Suffers();
    }

    public function all()
    {
        $data = $this->procedure->listSuffers();
        return Padece::hydrate($data);

    }

    public function create(array $data)
    {
       return $this->procedure->createSuffers($data);
    }

    public function update(array $data)
    {
        return $this->procedure->updateSuffers($data);
    }

    public function delete($id)
    {
        return $this->procedure->deleteSuffers($id);
    }

    public function find($id)
    {
        return 'BUSCAR PADECIMIENTO CON EL ID' . $id;
    }
}