<?php

namespace App\Repositories;
use App\Procedures\User;

class UserRepositoryImp implements UserRepository
{
    protected $procedure;

    /**
     * PostRepository constructor.
     *
     * @param Unidad $snidad
     */
    public function __construct()
    {
        $this->procedure = new User();
    }

    public function all()
    {
        return $this->procedure->listUser();
    }

    public function create(array $data)
    {
       return $this->procedure->createUser($data);
    }

    public function update(array $data)
    {
        return $this->procedure->updateUser($data);
    }

    public function updateOnlyEmail(array $data)
    {
        return $this->procedure->updateOnlyEmail($data);
    }

    public function delete($id)
    {
        return $this->procedure->deleteUser($id);
    }
}
