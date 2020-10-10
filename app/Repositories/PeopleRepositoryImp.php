<?php

namespace App\Repositories;
use App\Persona;
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
        $data = $this->procedure->listPerson();
        return Persona::hydrate($data);

    }

    public function create(array $data)
    {
       return $this->procedure->createPerson($data);
    }

    public function update(array $data, $id)
    {
        return 'SE HA ACTUALIZADO UNA PERSONA CON EL ID' . $id;
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

