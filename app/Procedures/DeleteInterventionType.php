<?php 

namespace App\Procedures;

class DeleteInterventionType{
    
    public function deleteInterventionType(){
        return DB::select('CALL SP_Eliminar_Tipo_Intervension');
    }
}
?>