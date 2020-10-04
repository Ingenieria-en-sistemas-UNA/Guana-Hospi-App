<?php 

namespace App\Procedures;

class CreatePatient{
    
    public function createPatient(){
        return DB::select('CALL SP_Crear_Paciente');
    }
}
?>