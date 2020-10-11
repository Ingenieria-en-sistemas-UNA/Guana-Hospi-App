<?php 
namespace App\Procedures;
use Illuminate\Support\Facades\DB;

class Disease{
    
    public function createDisease($fields){
        return DB::select('exec SP_Crear_Enfermedad ?', $fields);
    }
    public function deleteDisease(){
        return DB::select('exec SP_Eliminar_Enfermedad ?');
    }
    public function listDisease(){
        return DB::select('exec SP_Obtener_Enfermedades');
    }
    public function updateDisease($fields){
        return DB::select('exec SP_ActualizarEnfermedad ?', $fields);
    }
}
?>