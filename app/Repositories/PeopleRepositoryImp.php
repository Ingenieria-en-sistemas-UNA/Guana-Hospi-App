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

    public function create(Persona $data)
    {
        $this->procedure->createPerson();            
    }

    public function update(Persona $data, $id)
    {
        return 'SE HA ACTUALIZADO UNA PERSONA CON EL ID' . $id;
    }

    public function delete($id)
    {
        return 'SE HA ELIMINADO UNA PERSONA CON EL ID' . $id;
    }

    public function find($id)
    {
        return 'BUSCAR UNA PERSONA CON EL ID' . $id;
    }
}

