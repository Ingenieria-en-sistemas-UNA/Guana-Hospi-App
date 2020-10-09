<?php 

namespace App\Procedures;

class Suffers{
    
    public function createSuffers(){
        return DB::select('CALL SP_Crear_Padece(?,?)');
    }
    public function deleteSuffering(){
        return DB::select('CALL SP_Eliminar_Padecimiento(?)');
    }
}
?>