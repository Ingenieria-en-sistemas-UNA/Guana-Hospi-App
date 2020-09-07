<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $dni_persona
 * @property string $nombre
 * @property string $apellido_1
 * @property string $apellido_2
 * @property int $edad
 * @property Medico[] $medicos
 * @property Paciente[] $pacientes
 */
class Persona extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Persona';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'dni_persona';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['nombre', 'apellido_1', 'apellido_2', 'edad'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medicos()
    {
        return $this->hasMany('App\Medico', 'dni_persona', 'dni_persona');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pacientes()
    {
        return $this->hasMany('App\Paciente', 'dni_persona', 'dni_persona');
    }
}
