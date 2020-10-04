<?php 

namespace App\Procedures;

class CreateDoctorUnity{
    
    public function createDoctorUnity(){
        return DB::select('CALL SP_Crear_Unidad_Medico');
    }
}
?>