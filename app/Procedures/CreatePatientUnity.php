<?php 

namespace App\Procedures;

class CreatePatientUnity{
    
    public function createPatientUnity(){
        return DB::select('CALL SP_Crear_Paciente_Unidad');
    }
}
?>