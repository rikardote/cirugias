<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SurgeryRequests;
use Carbon\Carbon;
use App\Surgery;
use \mPDF;

class ProgramacionController extends Controller
{
   
    public function __construct()
    {
        //$this->middleware('auth');
        setlocale(LC_ALL,"es_MX.utf8");
        
    }

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
    public function pdf($date)
    {
        $date = fecha_ymd($date);  
        $cirugias = Surgery::orderBy('horario', 'asc')->orderBy('sala', 'asc')->where('fecha', '=', $date)->get();
        
        $cirugias->each(function($cirugias) {
            $cirugias->paciente;
            $cirugias->cirugia;
            $cirugias->medico;
            $cirugias->anestesiologo;
        });

        //
        
        $mpdf = new mPDF('', 'Letter');
        $header = \View('reportes.header')->with('date', $date)->render();
        $mpdf->SetFooter('Generado el: {DATE j-m-Y}| Programacion de Cirugias | &copy;'.date('Y').' ISSSTE BAJA CALIFORNIA');
        $html =  \View('reportes.diarias')->with('cirugias', $cirugias)->with('date', $date)->render();
        $pdfFilePath = 'Citas del '.fecha_dmy($date).'.pdf';
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';
        $mpdf->setHTMLHeader($header);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
   
        $mpdf->Output($pdfFilePath, "I"); //D
        
    }
    public function realizada($id)
    {
        $cirugia = Surgery::find($id);
        $cirugia->cirugia;
        $procedimientos = Cirugia::all()->lists('name', 'id')->toArray();
            asort($procedimientos);

        return view('programar_cirugia.form_realizada')->with('cirugia', $cirugia)->with('procedimientos', $procedimientos);
    }

}
