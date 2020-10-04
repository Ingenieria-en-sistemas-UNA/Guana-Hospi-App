<?php 

namespace App\Procedures;

class DeleteQuery{
    
    public function deleteQuery(){
        return DB::select('CALL SP_Eliminar_Consulta');
    }
}
?>