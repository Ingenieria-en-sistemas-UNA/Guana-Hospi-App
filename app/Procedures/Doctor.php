<?php
namespace App\Procedures;
use Illuminate\Support\Facades\DB;

class Doctor{

    public function createDoctor($fields){
        return DB::select('exec SP_Crear_Medico ?,?', $fields);
    }
    public function deleteDoctor($id){
        return DB::select('exec SP_Eliminar_Medico ?', array($id));
    }

    public function getDoctorById($id){
        return DB::select('exec SP_Obtener_Medicos_Por_Id ?', array($id));
    }
    public function listDoctor(){
        return DB::select('exec SP_Obtener_Medicos');
    }
    public function updateDoctor($fields){
        return DB::select('exec SP_ActualizarMedico ?,?,?', $fields);
    }
}
?>
