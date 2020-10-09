<?php 
use Illuminate\Support\Facades\DB;
namespace App\Procedures;

class Intervention{
    
    public function createIntervention(){
        return DB::select('CALL SP_Crear_Intervencion(?,?,?)');
    }
    public function deleteIntervention(){
        return DB::select('CALL SP_Eliminar_Intervencion(?)');
    }
}
?>