<?php 

namespace App\Procedures;

class deletePatient{
    
    public function DeletePatient(){
        return DB::select('CALL SP_Eliminar_Paciente');
    }
}
?>