<?php
namespace App\Procedures;
use Illuminate\Support\Facades\DB;

class DoctorUnity{
    
    public function createDoctorUnity($fields){
        return DB::select('exec SP_Crear_Unidad_Medico ?,?', $fields);
    }        
    public function deleteDoctorUnity($id){
        return DB::select('exec SP_Eliminar_Unidad_Medico ?', array($id));
    }
    public function listDoctorUnity(){
        return DB::select('exec SP_Obtener_Unidad_Medicos');
    }
    public function updateDoctorUnity($fields){
        return DB::select('exec SP_ActualizarUnidadMedico ?,?,?', $fields);
    }
}
?>