<?php 

namespace App\Procedures;

class DeleteSuffering{
    
    public function deleteSuffering(){
        return DB::select('CALL SP_Eliminar_Padecimiento');
    }
}
?>