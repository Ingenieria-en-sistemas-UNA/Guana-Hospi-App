<?php 

namespace App\Procedures;

class CreateIntervention{
    
    public function createIntervention(){
        return DB::select('CALL SP_Crear_Intervencion');
    }
}
?>