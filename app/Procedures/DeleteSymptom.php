<?php 

namespace App\Procedures;

class DeleteSymptom{
    
    public function deleteSymptom(){
        return DB::select('CALL SP_Eliminar_Sintoma');
    }
}
?>