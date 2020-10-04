<?php 

namespace App\Procedures;

class CreateTipeIntervention{
    
    public function createTipeIntervention(){
        return DB::select('CALL SP_Crear_Tipo_Intervencion');
    }
}
?>