<?php 

namespace App\Procedures;
use Illuminate\Support\Facades\DB;

class InterventionType{
    
    public function deleteInterventionType($id){
        return DB::select('exec SP_Eliminar_Tipo_Intervension ?', array($id));
    }
    public function createInterventionType($fields){
        return DB::select('exec SP_Crear_Tipo_Intervencion ?', $fields);
    }
    public function listInterventionType(){
        return DB::select('exec SP_Obtener_Tipo_Intervenciones');
    }
    public function updateInterventionType($fields){
        return DB::select('exec SP_ActualizarTipoIntervension ?,?', $fields);
    }
}
?> 