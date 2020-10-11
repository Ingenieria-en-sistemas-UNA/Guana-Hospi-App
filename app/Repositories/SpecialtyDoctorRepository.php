<?php

namespace App\Repositories;
use App\Medico_especialiad;

interface SpecialtyDoctorRepository
{
    public function all();

    public function create(array $data);

    public function update(array $data);

    public function delete($id);

    public function find($id);
}