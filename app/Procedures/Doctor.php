<?php 
use Illuminate\Support\Facades\DB;
namespace App\Procedures;

class Doctor{
    
    public function createDoctor(){
        return DB::select('exec SP_Crear_Medico ?,?', $fields);
    }
    public function deleteDoctor(){
        return DB::select('exec SP_Eliminar_Medico ?');
    }
    public function listDoctor(){
        return DB::select('exec SP_Obtener_Medico');
    }
    public function updateDoctor(){
        return DB::select('exec SP_ActualizarMedico ?,?', $fields);
    }
}
?>