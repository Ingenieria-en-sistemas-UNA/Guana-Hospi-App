<?php 
namespace App\Procedures;
use Illuminate\Support\Facades\DB;

class Intervention{
    
    public function createIntervention($fields){
        return DB::select('exec SP_Crear_Intervencion ?,?,?', $fields);
    }
    public function deleteIntervention($id){
        return DB::select('exec SP_Eliminar_Intervencion ?', array($id));
    }
    public function listIntervention(){
        return DB::select('exec SP_Obtener_Intervenciones');
    }
    public function updateIntervention($fields){
        return DB::select('exec SP_ActualizarIntervencion ?,?,?,?', $fields);
    }
    public function searchIntervQuery($id){
        return DB::select('exec SP_Obtener_Interv_Por_Id_Consulta ?', array($id));
    }
    public function deleteInterventionByQueryId($id){
        return DB::select('exec SP_Eliminar_Intervencion_Id_Consulta ?', array($id));
    }
}
?> 