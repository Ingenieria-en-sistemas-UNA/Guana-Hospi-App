<?php 

namespace App\Procedures;

class DeleteDisease{
    
    public function deleteDisease(){
        return DB::select('CALL SP_Eliminar_Enfermedad ');
    }
}
?>