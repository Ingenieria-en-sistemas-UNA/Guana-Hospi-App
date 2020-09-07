<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_unidad
 * @property string $nombre
 * @property int $numeroPlanta
 * @property Consultum[] $consultas
 * @property PacienteUnidad[] $pacienteUnidads
 * @property UnidadMedico[] $unidadMedicos
 */
class Unidad extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Unidad';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_unidad';

    /**
     * @var array
     */
    protected $fillable = ['nombre', 'numeroPlanta'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consultas()
    {
        return $this->hasMany('App\Consultum', 'id_unidad', 'id_unidad');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pacienteUnidads()
    {
        return $this->hasMany('App\PacienteUnidad', 'id_unidad', 'id_unidad');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unidadMedicos()
    {
        return $this->hasMany('App\UnidadMedico', 'id_unidad', 'id_unidad');
    }
}
