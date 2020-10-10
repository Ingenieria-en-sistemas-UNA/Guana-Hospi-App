<?php 
use Illuminate\Support\Facades\DB;
namespace App\Procedures;

class Disease{
    
    public function createDisease(){
        return DB::select('exec SP_Crear_Enfermedad ?',$fields);
    }
    public function deleteDisease(){
        return DB::select('exec SP_Eliminar_Enfermedad(?)');
    }
    public function listDisease(){
        return DB::select('exec SP_Obtener_Enfermedad');
    }
    public function updateDisease($fields){
        return DB::select('exec SP_ActualizarEnfermedad ?', $fields);
    }
}
?>