<?php 

namespace App\Procedures;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Query{
    
    public function createQuery($fields){
        return DB::select('exec SP_Crear_Consulta ?,?,?', $fields);
    }
    public function deleteQuery($id){
        return DB::select('exec SP_Elimina_Consulta ?,?', array($id, Auth::user()->id));
    }
    public function listQuery(){
        return DB::select('exec SP_Obtener_Consultas');
    }
    public function updateQuery($fields){
        return DB::select('exec SP_ActualizarConsulta ?,?,?,?,?', $fields);
    }
    public function getQueryById($id){
        return DB::select('exec SP_Obtener_Consulta_Por_Id ?', array($id));
    }
}
?>