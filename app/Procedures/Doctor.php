<?php 
use Illuminate\Support\Facades\DB;
namespace App\Procedures;

class Doctor{
    
    public function createDoctor(){
        return DB::select('CALL SP_Crear_Medico(?,?)');
    }
    public function deleteDoctor(){
        return DB::select('CALL SP_Eliminar_Medico(?)');
    }
}
?>