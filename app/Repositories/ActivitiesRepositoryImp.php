<?php

namespace App\Repositories;
use App\Procedures\Activity;

class ActivitiesRepositoryImp implements ActivitiesRepository
{
    protected $procedure;

    /**
     * PostRepository constructor.
     *
     * @param Enfermedad $enfermedad
     */
    public function __construct()
    {
        $this->procedure = new Activity();
    }

    public function all()
    {
        return $this->procedure->list();
    }

    public function create(array $data)
    {
       return $this->procedure->create($data);
    }

    public function update(array $data)
    {
        return $this->procedure->update($data);
    }

    public function delete($id)
    {
        return $this->procedure->delete($id);
    }

    public function find($id)
    {
        return $this->procedure->getById($id);
    }
}
