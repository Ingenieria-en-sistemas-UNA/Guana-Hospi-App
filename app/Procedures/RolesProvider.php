<?php

namespace App\Procedures;
use Illuminate\Support\Facades\DB;

class RolesProvider{

    public function createRole($fields){
        return DB::select('exec SP_Crear_Role ?', $fields);
    }
    public function listRoles(){
        return DB::select('exec SP_Obtener_Roles');
    }
    public function updateRole($fields){
        return DB::select('exec SP_Actualizar_Role ?,?', $fields);
    }
    public function getById($id){
        return DB::select('exec SP_Obtener_Role_Por_ID ?', array($id));
    }
    public function getByName($name){
        return DB::select('exec SP_Obtener_Role_Por_Nombre ?', array($name));
    }
}
?>
