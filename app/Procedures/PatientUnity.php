<?php 

namespace App\Procedures;
use Illuminate\Support\Facades\DB;

class PatientUnity{
    
    public function createPatientUnity($fields){
        return DB::select('exec SP_Crear_Paciente_Unidad ?,?', $fields);
    }
    public function DeletePatientUnity(){
        return DB::select('exec SP_Eliminar_Paciente_Unidad ?');
    }
    public function listInterventionTypeUnity(){
        return DB::select('exec SP_Obtener_Paciente_Unidad');
    }
    public function updateInterventionTypeUnity($fields){
        return DB::select('exec SP_ActualizarPaciente_Unidad ?,?', $fields);
    }
}
?>