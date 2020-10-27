<?php

namespace App\Repositories;

interface QueryRepository
{
    public function all();

    public function create(array $data);

    public function update(array $data);

    public function delete($id);

    public function find($id);
}
