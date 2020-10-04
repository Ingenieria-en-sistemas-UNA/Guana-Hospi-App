<?php 

namespace App\Procedures;

class CreateSpecialtyDoctor{
    
    public function createSpecialtyDoctor(){
        return DB::select('CALL SP_Crear_Medico_Especialidad');
    }
}
?>