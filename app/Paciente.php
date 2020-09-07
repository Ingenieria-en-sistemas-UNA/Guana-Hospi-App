<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_paciente
 * @property string $dni_persona
 * @property int $numeroSeguroSocial
 * @property string $fecha_ingreso
 * @property Persona $persona
 * @property Consultum[] $consultas
 * @property PacienteUnidad[] $pacienteUnidads
 * @property Padece[] $padeces
 */
class Paciente extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Paciente';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_paciente';

    /**
     * @var array
     */
    protected $fillable = ['dni_persona', 'numeroSeguroSocial', 'fecha_ingreso'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona()
    {
        return $this->belongsTo('App\Persona', 'dni_persona', 'dni_persona');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consultas()
    {
        return $this->hasMany('App\Consultum', 'id_paciente', 'id_paciente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pacienteUnidads()
    {
        return $this->hasMany('App\PacienteUnidad', 'id_paciente', 'id_paciente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function padeces()
    {
        return $this->hasMany('App\Padece', 'id_paciente', 'id_paciente');
    }
}
