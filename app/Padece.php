<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_paciente
 * @property int $id_enfermedad
 * @property int $id_pacienteEnfermedad
 * @property Paciente $paciente
 * @property Enfermedad $enfermedad
 */
class Padece extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Padece';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_pacienteEnfermedad';

    /**
     * @var array
     */
    protected $fillable = ['id_paciente', 'id_enfermedad'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paciente()
    {
        return $this->belongsTo('App\Paciente', 'id_paciente', 'id_paciente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enfermedad()
    {
        return $this->belongsTo('App\Enfermedad', 'id_enfermedad', 'id_enfermedad');
    }
}
