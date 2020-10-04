<?php 

namespace App\Procedures;

class DeletePresents{
    
    public function deletePresents(){
        return DB::select('CALL SP_Eliminar_Presenta');
    }
}
?>