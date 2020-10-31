<?php

namespace App\Repositories;
use App\Procedures\DWFill;

class DWFillRepositoryImp implements DWFillRepository
{
    protected $procedure;

    /**
     * PostRepository constructor.
     *
     * @param 
     */
    public function __construct()
    {
        $this->procedure = new DWFill();
    }

    public function delete()
    {
        return $this->procedure->deleteTables();
    }

    public function fill()
    {
       return $this->procedure->fillTables();
    }
}