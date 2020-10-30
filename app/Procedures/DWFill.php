<?php
namespace App\Procedures;
use Illuminate\Support\Facades\DB;

class DWFill{
    
    public function deleteTables(){
        return DB::select('exec SP_Eliminar_Tablas_DW');
    }        
    public function fillTables(){
        return DB::select('exec SP_LLenarDW');
    }
}
?>