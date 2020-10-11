<?php 

namespace App\Procedures;
use Illuminate\Support\Facades\DB;

class Presents{
    
    public function createPresents($fields){
        return DB::select('exec SP_Crear_Presenta ?,?,?', $fields);
    }
    public function deletePresents(){
        return DB::select('exec SP_Eliminar_Presenta(?)');
    }
    public function listPresents(){
        return DB::select('exec SP_Obtener_Presenta');
    }
    public function updatePresents($fields){
        return DB::select('exec SP_ActualizarPresenta ?,?,?,?', $fields);
    }
}
?>