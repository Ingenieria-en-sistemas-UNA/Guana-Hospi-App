<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_paciente_unidad
 * @property int $id_paciente
 * @property int $id_unidad
 * @property Unidad $unidad
 * @property Paciente $paciente
 */
class Paciente_unidad extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Paciente_unidad';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_paciente_unidad';

    /**
     * @var array
     */
    protected $fillable = ['id_paciente', 'id_unidad'];

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
}
