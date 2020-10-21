<?php 

namespace App\Procedures;
use Illuminate\Support\Facades\DB;

class Specialty{
    
    public function createSpecialty($fields){
        return DB::select('exec SP_Crear_Especialidad ?', $fields);
    }
    public function deleteSpecialty($id){
        return DB::select('exec SP_Eliminar_Especialidad ?', array($id));
    }
    public function listSpecialty(){
        return DB::select('exec SP_Obtener_Especialidades');
    }
    public function updateSpecialty($fields){
        return DB::select('exec SP_ActualizarEspecialidad ?,?', $fields);
    }
}
?>