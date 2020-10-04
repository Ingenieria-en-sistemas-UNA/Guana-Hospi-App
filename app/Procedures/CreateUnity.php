<?php 

namespace App\Procedures;

class CreateUnity{
    
    public function createUnity(){
        return DB::select('CALL SP_Crear_Unidad');
    }
}
?>