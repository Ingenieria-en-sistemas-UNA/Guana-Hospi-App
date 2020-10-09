<?php 

namespace App\Procedures;

class Specialty{
    
    public function createSpecialty(){
        return DB::select('CALL SP_Crear_Especialidad(?)');
    }
    public function deleteSpecialty(){
        return DB::select('CALL SP_Eliminar_Especialidad(?)');
    }
}
?>