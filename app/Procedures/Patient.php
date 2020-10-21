<?php 
namespace App\Procedures;
use Illuminate\Support\Facades\DB;

class Patient{
    
    public function createPatient($fields){
        return DB::select('exec SP_Crear_Paciente ?,?,?', $fields);
    }
    public function DeletePatient($id){
        return DB::select('exec SP_Eliminar_Paciente ?', array($id));
    }
    public function listPatient(){
        return DB::select('exec SP_Obtener_Pacientes');
    }
    public function updatePatient($fields){
        return DB::select('exec SP_ActualizarPaciente ?,?,?,?', $fields);
    }
}
?>