<?php

namespace App\Repositories;

interface RolesRepository
{
    public function all();

    public function create(array $data);

    public function update(array $data);

    public function findById($id);

    public function findByName($name);
}
