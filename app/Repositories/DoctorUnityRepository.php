<?php

namespace App\Repositories;
use App\Medico_unidad;

interface DoctorUnityRepository
{
    public function all();

    public function create(array $data);

    public function update(array $data);

    public function delete($id);

    public function find($id);
}