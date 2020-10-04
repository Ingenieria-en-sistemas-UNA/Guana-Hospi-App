<?php 

namespace App\Procedures;

class DeleteDoctorUnity{
    
    public function deleteDoctorUnity(){
        return DB::select('CALL SP_Eliminar_Unidad_Medico');
    }
}
?>