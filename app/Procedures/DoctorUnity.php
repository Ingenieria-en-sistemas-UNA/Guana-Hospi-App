<?php 
use Illuminate\Support\Facades\DB;
namespace App\Procedures;

class DoctorUnity{
    
    public function createDoctorUnity(){
        return DB::select('CALL SP_Crear_Unidad_Medico(?,?)');
    }        
    public function deleteDoctorUnity(){
        return DB::select('CALL SP_Eliminar_Unidad_Medico(?)');
    }
}
?>