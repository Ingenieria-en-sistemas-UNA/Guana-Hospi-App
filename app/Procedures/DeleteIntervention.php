<?php 

namespace App\Procedures;

class DeleteIntervention{
    
    public function deleteIntervention(){
        return DB::select('CALL SP_Eliminar_Intervencion');
    }
}
?>