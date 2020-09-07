<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_padecimiento
 * @property int $id_consulta
 * @property int $id_sintoma
 * @property string $descripcion
 * @property Sintoma $sintoma
 * @property Consultum $consultum
 */
class Presenta extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Presenta';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_padecimiento';

    /**
     * @var array
     */
    protected $fillable = ['id_consulta', 'id_sintoma', 'descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sintoma()
    {
        return $this->belongsTo('App\Sintoma', 'id_sintoma', 'id_sintoma');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function consultum()
    {
        return $this->belongsTo('App\Consultum', 'id_consulta', 'id_consulta');
    }
}
