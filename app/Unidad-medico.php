<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_unidad_medico
 * @property int $id_unidad
 * @property int $id_medico
 * @property Medico $medico
 * @property Unidad $unidad
 */
class Unidad-medico extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Unidad_medico';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_unidad_medico';

    /**
     * @var array
     */
    protected $fillable = ['id_unidad', 'id_medico'];

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
    public function unidad()
    {
        return $this->belongsTo('App\Unidad', 'id_unidad', 'id_unidad');
    }
}
