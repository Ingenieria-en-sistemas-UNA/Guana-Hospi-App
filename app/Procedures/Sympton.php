<?php 

namespace App\Procedures;
use Illuminate\Support\Facades\DB;

class Sympton{
    
    public function createSympton($fields){
        return DB::select('exec SP_Crear_Sintoma ?', $fields);
    }
    public function deleteSympton($id){
        return DB::select('exec SP_Eliminar_Sintoma ?', array($id));
    }
    public function listSympton(){
        return DB::select('exec SP_Obtener_Sintomas');
    }
    public function updateSympton($fields){
        return DB::select('exec SP_ActualizarSintoma ?,?', $fields);
    }
}
?>