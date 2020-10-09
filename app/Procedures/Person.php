<?php 
namespace App\Procedures;
use Illuminate\Support\Facades\DB;

class Person{
    
    public function createPerson($Dni, $Nombre, $Apellido1, $Apellido2, $Edad){
        return DB::select('exec SP_Crear_Persona(?,?,?,?,?)');
    }
    public function deletePerson(){
        return DB::select('exec SP_Eliminar_Persona(?)');
    }
    public function listPerson(){
        return DB::select('exec SP_Obtener_Personas');
    }
}
?>