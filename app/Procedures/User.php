<?php 
use Illuminate\Support\Facades\DB;
namespace App\Procedures;

class User{
    
    public function createUser(){
        return DB::select('CALL SP_Crear_Usuario(?,?,?)');
    }
        
    public function deleteUser(){
        return DB::select('CALL SP_Eliminar_Usuario(?)');
    }
}
?>