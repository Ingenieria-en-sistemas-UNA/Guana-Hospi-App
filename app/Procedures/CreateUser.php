<?php 

namespace App\Procedures;

class CreateUser{
    
    public function createUser(){
        return DB::select('CALL SP_Crear_Usuario');
    }
}
?>