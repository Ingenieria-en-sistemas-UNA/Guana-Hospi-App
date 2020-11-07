<?php
namespace App\Procedures;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Disease{

    public function createDisease($fields){
        return DB::select('exec SP_Crear_Enfermedad ?,?', $fields);
    }
    public function deleteDisease($id){
        return DB::select('exec SP_Eliminar_Enfermedad ?,?', array($id, Auth::user()->id));
    }
    public function listDisease(){
        return DB::select('exec SP_Obtener_Enfermedades');
    }
    public function updateDisease($fields){
        return DB::select('exec SP_ActualizarEnfermedad ?,?,?', $fields);
    }
    public function getById($id) {
        return DB::select('exec SP_Obtener_Enfermedades_Por_Id ?', array($id));
    }
    public function getByPacientId($id) {
        return DB::select('exec SP_Obtener_Enfermedades_Por_Id_Paciente ?', array($id));
    }
}
?>
