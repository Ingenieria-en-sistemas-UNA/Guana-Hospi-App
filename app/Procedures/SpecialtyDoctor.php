<?php 

namespace App\Procedures;
use Illuminate\Support\Facades\DB;

class SpecialtyDoctor{
    
    public function createSpecialtyDoctor($fields){
        return DB::select('exec SP_Crear_Medico_Especialidad ?,?', $fields);
    }
    public function deleteSpecialtyDoctor(){
        return DB::select('exec SP_Eliminar_Medico_Especialidad(?)');
    }
    public function listSpecialtyDoctor(){
        return DB::select('exec SP_Obtener_Medico_Especialidad');
    }
    public function updateSpecialtyDoctor($fields){
        return DB::select('exec SP_ActualizarMedicoEspecialidad ?,?,? ', $fields);
    }
}
?>