<?php 

namespace App\Procedures;

class DeletePerson{
    
    public function deletePerson(){
        return DB::select('CALL SP_Eliminar_Persona');
    }
}
?>