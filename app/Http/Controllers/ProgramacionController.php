<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SurgeryRequests;
use Carbon\Carbon;
use App\Surgery;
use App\Cirugia;
use \mPDF;
use Laracasts\Flash\Flash;


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
        Flash::success('! Cirugia Agregada !');
    	return redirect()->route('programar_cirugia.index', ['date' => $surgery->fecha]); 
    }

    public function update(Request $request , $id)
    {
        $surgery = Surgery::find($id);
        $surgery->cirugia_realizada = $request->cirugia_realizada;
        $surgery->tiempo_qx = $request->tiempo_qx;
        $surgery->hora_inicio = $request->hora_inicio;
        $surgery->hora_final = $request->hora_final;
        $surgery->observaciones = $request->observaciones;
        $surgery->save();

        return redirect()->route('programar_cirugia.index', ['date' => $surgery->fecha]); 
    }

    public function destroy($id)
    {
        $surgery = Surgery::find($id);
        $surgery->delete();
        Flash::error('Cirugia Borrada con exito!');
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
        $surgery = Surgery::find($id);
        $surgery->cirugia;
        $surgery->paciente;
        $surgery->medico;
        $surgery->anestesiologo;
        $procedimientos = Cirugia::all()->lists('name', 'id')->toArray();
        asort($procedimientos);

        return view('programar_cirugia.form_realizada')->with('surgery', $surgery)->with('procedimientos', $procedimientos);
    }
    public function reporte_semanal()
    {
        return view('reportes.semanal');
    }

    public function reporte_semanal_pdf(Request $request)
    {
        $fecha_inicio = fecha_ymd($request->fecha_inicio);
        $fecha_final = fecha_ymd($request->fecha_final);
        $surgerys = Surgery::whereBetween('fecha',[$fecha_inicio,$fecha_final])->orderBy('fecha', 'ASC')->get();
        $surgerys->each(function($surgerys) {
            $surgerys->paciente;
            $surgerys->cirugia;
            $surgerys->medico;
            $surgerys->anestesiologo;
        });
        $mpdf = new mPDF('', 'Legal-L');
        $header = \View('reportes.header_semanal')->with('date', $fecha_inicio)->render();
        $mpdf->SetFooter('Generado el: {DATE j-m-Y}| Programacion de Cirugias | &copy;'.date('Y').' ISSSTE BAJA CALIFORNIA');
        $html =  \View('reportes.semanal_show')->with('surgerys', $surgerys)->with('date', $date)->render();
        $pdfFilePath = 'Citas del '.fecha_dmy($date).'.pdf';
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';
        $mpdf->setHTMLHeader($header);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
   
        $mpdf->Output($pdfFilePath, "I"); //D

        //return view('reportes.semanal_show')->with('surgerys', $surgerys);
    }
}
