<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_medico
 * @property int $id_usuario
 * @property int $id_especialidad
 * @property string $dni_persona
 * @property int $codigo_medico
 * @property Persona $persona
 * @property Usuario $usuario
 * @property Especialidad $especialidad
 * @property UnidadMedico[] $unidadMedicos
 */
class Medico extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Medico';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_medico';

    /**
     * @var array
     */
    protected $fillable = ['id_usuario', 'id_especialidad', 'dni_persona', 'codigo_medico'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona()
    {
        return $this->belongsTo('App\Persona', 'dni_persona', 'dni_persona');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'id_usuario', 'id_usuario');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function especialidad()
    {
        return $this->belongsTo('App\Especialidad', 'id_especialidad', 'id_especialidad');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unidadMedicos()
    {
        return $this->hasMany('App\UnidadMedico', 'id_medico', 'id_medico');
    }
}
