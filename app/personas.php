<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $person_id
 * @property string $name
 * @property string $lastname1
 * @property string $lastname2
 * @property string $phone
 * @property string $email
 * @property string $birth
 */
class personas extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['person_id', 'name', 'lastname1', 'lastname2', 'phone', 'email', 'birth'];

}
