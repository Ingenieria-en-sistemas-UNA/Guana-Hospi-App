<?php 
namespace App\Procedures;
use Illuminate\Support\Facades\DB;

class Intervention{
    
    public function createIntervention($fields){
        return DB::select('CALL SP_Crear_Intervencion ?,?,?', $fields);
    }
    public function deleteIntervention(){
        return DB::select('CALL SP_Eliminar_Intervencion(?)');
    }
    public function listIntervention(){
        return DB::select('exec SP_Obtener_Intervenciones');
    }
    public function updateIntervention($fields){
        return DB::select('exec SP_ActualizarIntervencion ?,?,?', $fields);
    }
}
?>