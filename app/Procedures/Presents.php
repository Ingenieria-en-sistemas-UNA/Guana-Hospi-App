<?php 

namespace App\Procedures;

class Presents{
    
    public function createPresents(){
        return DB::select('CALL SP_Crear_Presenta(?,?,?)');
    }
    public function deletePresents(){
        return DB::select('CALL SP_Eliminar_Presenta(?)');
    }
}
?>