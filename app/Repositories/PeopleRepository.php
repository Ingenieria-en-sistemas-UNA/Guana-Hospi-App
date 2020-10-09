<?php

namespace App\Repositories;
use App\Persona;

interface PeopleRepository
{
    public function all();

    public function create(Persona $data);

    public function update(persona $data, $id);

    public function delete($id);

    public function find($id);
}