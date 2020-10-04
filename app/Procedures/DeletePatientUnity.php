<?php 

namespace App\Procedures;

class DeletePatientUnity{
    
    public function deletePatientUnity(){
        return DB::select('CALL SP_Eliminar_Unidad_Paciente');
    }
}
?>