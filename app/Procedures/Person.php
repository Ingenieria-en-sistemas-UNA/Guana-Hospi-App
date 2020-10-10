<?php
namespace App\Procedures;
use Illuminate\Support\Facades\DB;

class Person{

    public function createPerson($fields){
        return DB::select('exec SP_Crear_Persona ?,?,?,?,?', $fields);
    }
    public function deletePerson($id){
        return DB::select('exec SP_Eliminar_Persona ?', array($id));
    }
    public function listPerson(){
        return DB::select('exec SP_Obtener_Personas');
    }
    public function updatePerson($fields){
        return DB::select('exec SP_ActualizarPersona ?,?,?,?,?', $fields);
    }
}
  