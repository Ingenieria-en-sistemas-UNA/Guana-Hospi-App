<?php 

namespace App\Procedures;

class InterventionType{
    
    public function deleteInterventionType(){
        return DB::select('CALL SP_Eliminar_Tipo_Intervension(?)');
    }
    public function createInterventionType(){
        return DB::select('CALL SP_Crear_Tipo_Intervension(?)');
    }
}
?>