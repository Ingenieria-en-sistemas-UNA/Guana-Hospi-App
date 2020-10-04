<?php 

namespace App\Procedures;

class CreateDoctor{
    
    public function createDoctor(){
        return DB::select('CALL SP_Crear_Medico');
    }
}
?>