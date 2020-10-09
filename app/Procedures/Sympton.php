<?php 

namespace App\Procedures;

class Symptom{
    
    public function createSymptom(){
        return DB::select('CALL SP_Crear_Sintoma(?)');
    }
    public function deleteSymptom(){
        return DB::select('CALL SP_Eliminar_Sintoma(?)');
    }
}
?>