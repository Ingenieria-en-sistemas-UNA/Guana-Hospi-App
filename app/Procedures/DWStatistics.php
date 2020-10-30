<?php
namespace App\Procedures;
use Illuminate\Support\Facades\DB;

class DWStatistics{
    
    public function topDisease(){
        return DB::select('exec SP_Top_Enfermedades');
    }        
    public function topUnity(){
        return DB::select('exec SP_Top_Unidades');
    }
    public function topDoctorIntervention(){
        return DB::select('exec SP_Top_Medico_Intervenciones');
    }
    public function topInterventionType(){
        return DB::select('exec SP_Top_Tipo_Intervenciones');
    }
}
?>