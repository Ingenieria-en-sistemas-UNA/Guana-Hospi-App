<?php 

namespace App\Procedures;

class InterventionType{
    
    public function deleteInterventionType(){
        return DB::select('CALL SP_Eliminar_Tipo_Intervension(?)');
    }
    public function createInterventionType(){
        return DB::select('CALL SP_Crear_Tipo_Intervencion ?,?', $fields);
    }
    public function listInterventionType(){
        return DB::select('exec SP_Obtener_Intervenciones');
    }
    public function updateInterventionType(){
        return DB::select('exec SP_ActualizarTipoIntervension ?,?', $fields);
    }
}
?>