<?php 

namespace App\Procedures;

class DeleteDoctor{
    
    public function deleteDoctor(){
        return DB::select('CALL SP_Eliminar_Medico');
    }
}
?>