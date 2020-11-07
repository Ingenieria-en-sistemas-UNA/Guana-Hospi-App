<?php 
namespace App\Procedures;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Patient{
    
    public function createPatient($fields){
        return DB::select('exec SP_Crear_Paciente ?,?,?,?', $fields);
    }
    public function DeletePatient($id){
        return DB::select('exec SP_Eliminar_Paciente ?,?', array($id, Auth::user()->id));
    }

    public function getPatientById($id){
        return DB::select('exec SP_Obtener_Paciente_Por_Id ?', array($id));
    }

    public function listPatient(){
        return DB::select('exec SP_Obtener_Pacientes');
    }
    public function updatePatient($fields){
        return DB::select('exec SP_ActualizarPaciente ?,?,?,?,?', $fields);
    }
}
?>