<?php 
namespace App\Procedures;
use Illuminate\Support\Facades\DB;

class Patient{
    
    public function createPatient($fields){
        return DB::select('exec SP_Crear_Paciente ?,?,?', $fields);
    }
    public function DeletePatient(){
        return DB::select('exec SP_Eliminar_Paciente ?');
    }
    public function listInterventionType(){
        return DB::select('exec SP_Obtener_Tipo_Intervenciones');
    }
    public function updateInterventionType($fields){
        return DB::select('exec SP_ActualizarPaciente ?,?,?', $fields);
    }
}
?>