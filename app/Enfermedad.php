<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_enfermedad
 * @property string $nombre
 * @property Padece[] $padeces
 */
class Enfermedad extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Enfermedad';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_enfermedad';

    /**
     * @var array
     */
    protected $fillable = ['nombre'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function padeces()
    {
        return $this->hasMany('App\Padece', 'id_enfermedad', 'id_enfermedad');
    }
}
