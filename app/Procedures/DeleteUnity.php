<?php 

namespace App\Procedures;

class DeleteUnity{
    
    public function deleteUnity(){
        return DB::select('CALL SP_Eliminar_Unidad');
    }
}
?>