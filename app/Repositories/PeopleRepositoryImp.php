<?php

namespace App\Repositories;
use App\Procedures\Person;

class PeopleRepositoryImp implements PeopleRepository
{
    protected $procedure;

    /**
     * PostRepository constructor.
     *
     * @param Persona $persona
     */
    public function __construct()
    {
        $this->procedure = new Person();
    }

    public function all()
    {
        return $this->procedure->listPerson();
    }

    public function create(array $data)
    {
       return $this->procedure->createPerson($data);
    }

    public function update(array $data)
    {
        return $this->procedure->updatePerson($data);
    }

    public function delete($id)
    {
        return $this->procedure->deletePerson($id);
    }

    public function find($id)
    {
        return 'BUSCAR UNA PERSONA CON EL ID' . $id;
    }
}

