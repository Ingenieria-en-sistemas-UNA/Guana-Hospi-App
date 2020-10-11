<?php 

namespace App\Procedures;
use Illuminate\Support\Facades\DB;

class Unity{
    
    public function createUnity($fields){
        return DB::select('exec SP_Crear_Unidad ?,?', $fields);
    }
    public function deleteUnity(){
        return DB::select('exec SP_Eliminar_Unidad ?');
    }
    public function listUnity(){
        return DB::select('exec SP_Obtener_Unidades');
    }
    public function updateUnity($fields){
        return DB::select('exec SP_ActualizarUnidad ?,?,?', $fields);
    }
}
?>