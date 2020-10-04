<?php 

namespace App\Procedures;

class CreateDisease{
    
    public function createDisease(){
        return DB::select('CALL SP_Crear_Enfermedad');
    }
}
?>