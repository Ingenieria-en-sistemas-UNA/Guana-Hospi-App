<?php 

namespace App\Procedures;

class CreateSpecialty{
    
    public function createSpecialty(){
        return DB::select('CALL SP_Crear_Especialidad');
    }
}
?>