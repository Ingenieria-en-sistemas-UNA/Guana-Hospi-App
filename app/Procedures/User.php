<?php 

namespace App\Procedures;
use Illuminate\Support\Facades\DB;

class User{
    
    public function createUser($fields){
        return DB::select('exec SP_Crear_Usuario ?,?,?', $fields);
    }
    public function deleteUser(){
        return DB::select('exec SP_Eliminar_Usuario ?');
    }
    public function listUser(){
        return DB::select('exec SP_Obtener_Usuarios');
    }
    public function updateUser($fields){
        return DB::select('exec SP_ActualizarUsuario ?,?,?,?', $fields);
    }
}
?>