<?php 

namespace App\Procedures;
use Illuminate\Support\Facades\DB;

class Specialty{
    
    public function createSpecialty($fields){
        return DB::select('exec SP_Crear_Especialidad ?', $fields);
    }
    public function deleteSpecialty(){
        return DB::select('exec SP_Eliminar_Especialidad(?)');
    }
    public function listSpecialty(){
        return DB::select('exec SP_Obtener_Especialidades');
    }
    public function updateSpecialty($fields){
        return DB::select('exec SP_ActualizarEspecialidad ?,? ', $fields);
    }
}
?>