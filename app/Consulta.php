<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_consulta
 * @property int $id_paciente
 * @property int $id_unidad
 * @property string $fecha
 * @property string $sintoma_observado
 * @property Unidad $unidad
 * @property Paciente $paciente
 * @property Intervencione[] $intervenciones
 * @property Presentum[] $presentas
 */
class Consulta extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Consulta';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_consulta';

    /**
     * @var array
     */
    protected $fillable = ['id_paciente', 'id_unidad', 'fecha', 'sintoma_observado'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unidad()
    {
        return $this->belongsTo('App\Unidad', 'id_unidad', 'id_unidad');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paciente()
    {
        return $this->belongsTo('App\Paciente', 'id_paciente', 'id_paciente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function intervenciones()
    {
        return $this->hasMany('App\Intervencione', 'id_consulta', 'id_consulta');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function presentas()
    {
        return $this->hasMany('App\Presentum', 'id_consulta', 'id_consulta');
    }
}
