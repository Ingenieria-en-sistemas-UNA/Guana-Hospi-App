<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_tipo_intervencion
 * @property string $nombre
 * @property Intervencione[] $intervenciones
 */
class TipoIntervencion extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'TipoIntervencion';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_tipo_intervencion';

    /**
     * @var array
     */
    protected $fillable = ['nombre'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function intervenciones()
    {
        return $this->hasMany('App\Intervencione', 'id_tipo_intervencion', 'id_tipo_intervencion');
    }
}
