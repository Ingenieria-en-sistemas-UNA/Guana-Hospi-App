<?php 

namespace App\Procedures;

class CreatePerson{
    
    public function createPerson(){
        return DB::select('CALL SP_Crear_Persona');
    }
}
?>