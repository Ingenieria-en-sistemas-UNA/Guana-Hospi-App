<?php 

namespace App\Procedures;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class User{
    
    public function createUser($fields){
        return DB::select('exec SP_Crear_User ?,?,?,?,?', $fields);
    }
    public function deleteUser($id){
        return DB::select('exec SP_Eliminar_User ?,?', array($id, Auth::user()->id));
    }
    public function listUser(){
        return DB::select('exec SP_Obtener_Usuarios');
    }
    public function updateUser($fields){
        return DB::select('exec SP_Actualizar_User ?,?,?', $fields);
    }

    public function updateOnlyEmail($fields){
        return DB::select('exec SP_Actaulizar_User_Correo ?,?,?', $fields);
    }
}
?>