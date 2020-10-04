<?php 

namespace App\Procedures;

class CreateQuery{
    
    public function createQuery(){
        return DB::select('CALL SP_Crear_Especialidad');
    }
}
?>