<?php 

namespace App\Procedures;

class CreatePresents{
    
    public function createPresents(){
        return DB::select('CALL SP_Crear_Presenta');
    }
}
?>