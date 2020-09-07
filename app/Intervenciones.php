<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_intervencion
 * @property int $id_tipo_intervencion
 * @property int $id_consulta
 * @property string $tratamiento
 * @property Consultum $consultum
 * @property TipoIntervencion $tipoIntervencion
 */
class Intervenciones extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Intervenciones';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_intervencion';

    /**
     * @var array
     */
    protected $fillable = ['id_tipo_intervencion', 'id_consulta', 'tratamiento'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function consultum()
    {
        return $this->belongsTo('App\Consultum', 'id_consulta', 'id_consulta');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoIntervencion()
    {
        return $this->belongsTo('App\TipoIntervencion', 'id_tipo_intervencion', 'id_tipo_intervencion');
    }
}
