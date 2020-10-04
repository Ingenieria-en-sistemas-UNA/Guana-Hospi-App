<?php 

namespace App\Procedures;

class DeleteDoctorSpecialty{
    
    public function deleteDoctorSpecialty(){
        return DB::select('CALL SP_Eliminar_Medico_Especialidad');
    }
}
?>