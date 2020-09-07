<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_especialidad
 * @property string $nombreEspecialdad
 * @property Medico[] $medicos
 */
class Especialidad extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Especialidad';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_especialidad';

    /**
     * @var array
     */
    protected $fillable = ['nombreEspecialdad'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medicos()
    {
        return $this->hasMany('App\Medico', 'id_especialidad', 'id_especialidad');
    }
}
