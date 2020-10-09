<?php 
use Illuminate\Support\Facades\DB;
namespace App\Procedures;

class Disease{
    
    public function createDisease(){
        return DB::select('CALL SP_Crear_Enfermedad(?)');
    }
    public function deleteDisease(){
        return DB::select('CALL SP_Eliminar_Enfermedad(?)');
    }
}
?>