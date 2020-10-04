<?php

namespace App\Repositories;
use App\Persona;

class PeopleRepositoryImp extends PeopleRepository
{
    protected $model;

    /**
     * PostRepository constructor.
     *
     * @param Persona $persona
     */
    public function __construct(Persona $persona)
    {
        $this->model = $persona;
    }

    public function all(): array
    {
        return array();
    }

    public function create(Persona $data)
    {
        return 'SE HA CREADO UNA PERSONA';
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

