<?php 
use Illuminate\Support\Facades\DB;
namespace App\Procedures;

class CreatePatient{
    
    public function createPatient(){
        return DB::select('CALL SP_Crear_Paciente(?,?,?)');
    }
    public function DeletePatient(){
        return DB::select('CALL SP_Eliminar_Paciente(?)');
    }
}
?>