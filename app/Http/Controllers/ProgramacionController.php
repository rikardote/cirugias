<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SurgeryRequests;
use Carbon\Carbon;
use App\Surgery;

class ProgramacionController extends Controller
{
    public function index()
    {
    	if (isset($_GET["date"])) {
            $date = $_GET["date"];
        }else {
	

        	$today = Carbon::today();
    	    $date = $today->year.'-'.$today->month.'-'.$today->day;
	    }
        $date = fecha_ymd($date);  
    	$cirugias = Surgery::orderBy('horario', 'asc')->orderBy('sala', 'asc')->where('fecha', '=', $date)->get();
    	
    	$cirugias->each(function($cirugias) {
            $cirugias->paciente;
            $cirugias->cirugia;
            $cirugias->medico;
            $cirugias->anestesiologo;
        });

    	return view('programar_cirugia.index')->with('cirugias', $cirugias)->with('date', $date);
    }
    public function nueva($date)
    {
    	return view('programar_cirugia.buscar_paciente')->with('date', $date);
    }
    public function store(SurgeryRequests $request)
    {
    	$surgery = new Surgery($request->all());
    	$surgery->fecha = fecha_ymd($request->fecha);
    	$surgery->save();

    	return redirect()->route('programar_cirugia.index', ['date' => $surgery->fecha]); 
    }

}
