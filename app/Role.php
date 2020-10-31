<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "Roles";

    protected $primaryKey = 'id_role';

    protected $fillable = ['nombre_role'];
}
