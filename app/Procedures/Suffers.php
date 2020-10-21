<?php 

namespace App\Procedures;
use Illuminate\Support\Facades\DB;

class Suffers{
    
    public function createSuffers($fields){
        return DB::select('exec SP_Crear_Padece ?,?', $fields);
    }
    public function deleteSuffers($id){
        return DB::select('exec SP_Eliminar_Padecimiento ?', array($id));
    }
    public function listSuffers(){
        return DB::select('exec SP_Obtener_Padece');
    }
    public function updateSuffers($fields){
        return DB::select('exec SP_ActualizarPadece ?,?,? ', $fields);
    }
}
?>