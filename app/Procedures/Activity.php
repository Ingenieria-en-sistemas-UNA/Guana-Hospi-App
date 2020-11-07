<?php
namespace App\Procedures;
use Illuminate\Support\Facades\DB;

class Activity{

    public function create($fields){
        return DB::select('exec SP_Crear_Auditoria ?,?', $fields);
    }
    public function delete($id){
        return DB::select('exec SP_Eliminar_Enfermedad ?', array($id));
    }
    public function list(){
        return DB::select('EXEC SP_Obtener_Auditoria');
    }
    public function update($fields){
        return DB::select('exec SP_ActualizarEnfermedad ?,?', $fields);
    }

    public function getById($id) {
        return DB::select('exec SP_Obtener_Enfermedades_Por_Id ?', array($id));
    }
}
?>
