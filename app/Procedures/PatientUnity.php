<?php 

namespace App\Procedures;
use Illuminate\Support\Facades\DB;

class PatientUnity{
    
    public function createPatientUnity($fields){
        return DB::select('exec SP_Crear_Paciente_Unidad ?,?', $fields);
    }
    public function DeletePatientUnity($id){
        return DB::select('exec SP_Eliminar_Unidad_Paciente ?', array($id));
    }
    public function listPatientUnity(){
        return DB::select('exec SP_Obtener_Paciente_Unidades');
    }
    public function updatePatientUnity($fields){
        return DB::select('exec SP_ActualizarPaciente_Unidad ?,?,?', $fields);
    }
}
?>