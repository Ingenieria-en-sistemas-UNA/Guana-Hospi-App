<?php 

namespace App\Procedures;

class SpecialtyDoctor{
    
    public function createSpecialtyDoctor(){
        return DB::select('CALL SP_Crear_Medico_Especialidad(?,?)');
    }
    public function deleteSpecialtySpecialty(){
        return DB::select('CALL SP_Eliminar_Medico_Especialidad(?)');
    }
}
?>