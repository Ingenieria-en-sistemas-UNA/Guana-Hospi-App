<?php

namespace App\Procedures;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Specialty{

    public function createSpecialty($fields){
        return DB::select('exec SP_Crear_Especialidad ?,?', $fields);
    }
    public function deleteSpecialty($id){
        return DB::select('exec SP_Eliminar_Especialidad ?,?', array($id, Auth::user()->id));
    }
    public function listSpecialty(){
        return DB::select('exec SP_Obtener_Especialidades');
    }
    public function listSpecialtyByDoctorId($id){
        return DB::select('exec SP_Obtener_Especialidades_Por_Medico_Id ?', array($id));
    }
    public function updateSpecialty($fields){
        return DB::select('exec SP_ActualizarEspecialidad ?,?', $fields);
    }

    public function getById($id){
        return DB::select('exec SP_Obtener_Especialidades_Por_Id ?', array($id));
    }

}
?>
