<?php 

namespace App\Procedures;

class Query{
    
    public function createQuery(){
        return DB::select('CALL SP_Crear_Especialidad(?,?,?)');
    }
    public function deleteQuery(){
        return DB::select('CALL SP_Eliminar_Consulta(?)');
    }
}
?>