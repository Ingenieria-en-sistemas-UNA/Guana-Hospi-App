<?php 

namespace App\Procedures;

class DeleteUser{
    
    public function deleteUser(){
        return DB::select('CALL SP_Eliminar_Usuario');
    }
}
?>