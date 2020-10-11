<?php

namespace App\Repositories;
use App\Paciente;

interface PatientRepository
{
    public function all();

    public function create(array $data);

    public function update(array $data);

    public function delete($id);

    public function find($id);
}