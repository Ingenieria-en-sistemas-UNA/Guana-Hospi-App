<?php 

namespace App\Procedures;

class CreateSymptom{
    
    public function createSymptom(){
        return DB::select('CALL SP_Crear_Sintoma');
    }
}
?>