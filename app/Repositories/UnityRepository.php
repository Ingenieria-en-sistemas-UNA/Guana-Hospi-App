<?php

namespace App\Repositories;
use App\Unidad;

interface UnityRepository
{
    public function all();

    public function create(array $data);

    public function update(array $data);

    public function delete($id);

    public function find($id);
}