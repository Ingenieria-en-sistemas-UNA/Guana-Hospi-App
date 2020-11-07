<?php 

namespace App\Procedures;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InterventionType{
    
    public function deleteInterventionType($id){
        return DB::select('exec SP_Eliminar_Tipo_Intervension ?,?', array($id, Auth::user()->id));
    }
    public function createInterventionType($fields){
        return DB::select('exec SP_Crear_Tipo_Intervencion ?,?', $fields);
    }
    public function listInterventionType(){
        return DB::select('exec SP_Obtener_Tipos_Intervenciones');
    }
    public function updateInterventionType($fields){
        return DB::select('exec SP_ActualizarTipoIntervension ?,?,?', $fields);
    }
    public function getInterventionById($id){
        return DB::select('exec SP_Obtener_Tipos_Intervencione_Por_Id ?', array($id));
    }
}
?> 