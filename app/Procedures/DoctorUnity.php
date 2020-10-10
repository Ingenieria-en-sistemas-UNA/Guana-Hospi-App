<?php 
use Illuminate\Support\Facades\DB;
namespace App\Procedures;

class DoctorUnity{
    
    public function createDoctorUnity(){
        return DB::select('CALL SP_Crear_Unidad_Medico ?,?', $fields);
    }        
    public function deleteDoctorUnity(){
        return DB::select('CALL SP_Eliminar_Unidad_Medico(?)');
    }
    public function listDoctorUnity(){
        return DB::select('exec SP_Obtener_Unidad_Medicos');
    }
    public function updateDoctorUnity(){
        return DB::select('exec SP_ActualizarUnidadMedico ?,?', $fields);
    }
}
?>