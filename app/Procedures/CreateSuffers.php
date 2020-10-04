<?php 

namespace App\Procedures;

class CreateSuffers{
    
    public function createSuffers(){
        return DB::select('CALL SP_Crear_Padece');
    }
}
?>