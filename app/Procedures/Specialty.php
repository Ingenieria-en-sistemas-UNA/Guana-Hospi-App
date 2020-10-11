<?php 

namespace App\Procedures;

class Specialty{
    
    public function createSpecialty(){
        return DB::select('exec SP_Crear_Especialidad(?)');
    }
    public function deleteSpecialty(){
        return DB::select('exec SP_Eliminar_Especialidad(?)');
    }
    public function listQuery(){
        return DB::select('exec SP_Obtener_Especialidades');
    }
    public function updateQuery($fields){
        return DB::select('exec SP_ActualizarEspecialidad ?,?,? ', $fields);
    }
}
?>