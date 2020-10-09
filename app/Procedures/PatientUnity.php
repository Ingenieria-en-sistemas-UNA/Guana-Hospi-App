<?php 

namespace App\Procedures;

class PatientUnity{
    
    public function createPatientUnity(){
        return DB::select('CALL SP_Crear_Paciente_Unidad(?,?)');
    }
    public function deletePatientUnity(){
        return DB::select('CALL SP_Eliminar_Unidad_Paciente(?)');
    }
}
?>