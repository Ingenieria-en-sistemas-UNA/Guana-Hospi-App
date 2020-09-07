<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_sintoma
 * @property string $nombre
 * @property Presentum[] $presentas
 */
class Sintoma extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Sintoma';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_sintoma';

    /**
     * @var array
     */
    protected $fillable = ['nombre'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function presentas()
    {
        return $this->hasMany('App\Presentum', 'id_sintoma', 'id_sintoma');
    }
}
