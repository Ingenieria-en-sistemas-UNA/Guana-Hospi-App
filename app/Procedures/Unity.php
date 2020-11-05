<?php

namespace App\Procedures;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Unity{

    public function createUnity($fields){
        return DB::select('exec SP_Crear_Unidad ?,?,?,?', $fields);
    }
    public function deleteUnity($id){
        return DB::select('exec SP_Eliminar_Unidad ?,?', array($id, Auth::user()->id));
    }
    public function listUnity(){
        return DB::select('exec SP_Obtener_Unidades');
    }
    public function updateUnity($fields){
        return DB::select('exec SP_ActualizarUnidad ?,?,?,?', $fields);
    }

    public function getUnityById($id){
        return DB::select('exec SP_Obtener_Unidade_Por_Id ?', array($id));
    }
}
?>
