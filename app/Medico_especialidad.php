<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_medico_especialidad
 * @property int $id_medico
 * @property int $id_especialidad
 * @property Medico $medico
 * @property Especialidad $especialidad
 */
class Medico_especialidad extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Medico_Especialidad';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_medico_especialidad';

    /**
     * @var array
     */
    protected $fillable = ['id_medico', 'id_especialidad'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medico()
    {
        return $this->belongsTo('App\Medico', 'id_medico', 'id_medico');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function especialidad()
    {
        return $this->belongsTo('App\Especialidad', 'id_especialidad', 'id_especialidad');
    }
}
