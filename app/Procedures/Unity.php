<?php 

namespace App\Procedures;

class Unity{
    
    public function createUnity(){
        return DB::select('CALL SP_Crear_Unidad(?,?)');
    }
    public function deleteUnity(){
        return DB::select('CALL SP_Eliminar_Unidad');
    }
}
?>