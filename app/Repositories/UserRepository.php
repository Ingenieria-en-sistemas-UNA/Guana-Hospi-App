<?php

namespace App\Repositories;

interface UserRepository
{
    public function all();

    public function create(array $data);

    public function update(array $data);

    public function delete($id);

    public function updateOnlyEmail(array $data);

}