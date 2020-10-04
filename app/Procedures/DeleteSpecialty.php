<?php 

namespace App\Procedures;

class DeleteSpecialty{
    
    public function deleteSpecialty(){
        return DB::select('CALL SP_Eliminar_Especialidad');
    }
}
?>