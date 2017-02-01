<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Surgery;
use App\Cirugia;
use App\Medico;
use App\Anestesiologo;

use \mPDF;
use Laracasts\Flash\Flash;

use App\Http\Requests;

class HojamedicaController extends Controller
{
    public function index(){
    	if (isset($_GET["date"])) {
            $date = $_GET["date"];
        }else {
	       	$today = Carbon::today();
    	    $date = $today->year.'-'.$today->month.'-'.$today->day;
	    }
	    $user_id = \Auth::user()->medico_id;

        $date = fecha_ymd($date);  
    	$cirugias = Surgery::orderBy('horario', 'asc')->orderBy('sala', 'asc')->where('fecha', '=', $date)->where('medico_id', '=', $user_id)->get();
    	
    	$cirugias->each(function($cirugias) {
            $cirugias->paciente;
            $cirugias->cirugia;
            $cirugias->medico;
            $cirugias->anestesiologo;
        });

    	return view('hojamedica.index')->with('cirugias', $cirugias)->with('date', $date);
    }
    public function nueva($date)
    {
    	return view('hojamedica.buscar_paciente')->with('date', $date);
    }
    public function store(Request $request)
    {
        $medico_id = \Auth::user()->medico_id;
      	$surgery = new Surgery($request->all());
    	$surgery->fecha = fecha_ymd($request->fecha);
        $surgery->anestesiologo_id = 7;
        $surgery->medico_id = $medico_id;
        ($request->urgencias == 1) ? $surgery->urgencias=1:$surgery->urgencias="";

    	$surgery->save();
        Flash::success('! Cirugia Agregada !');
    	return redirect()->route('hojamedica.index', ['date' => $surgery->fecha]); 
    }

    public function update(Request $request, $id)
    {

        $surgery = Surgery::find($id);
        $surgery->fill($request->all());
        //$surgery->cirugia_realizada = $request->cirugia_realizada;
        //$surgery->tiempo_qx = $request->tiempo_qx;
        //$surgery->hora_inicio = $request->hora_inicio;
        //$surgery->hora_final = $request->hora_final;
        //$surgery->observaciones = $request->observaciones;
        
        $surgery->cerrada = 1;

        $surgery->save();

        return redirect()->route('hojamedica.index', ['date' => $surgery->fecha]); 
        
    }

    public function destroy($id)
    {
        $surgery = Surgery::find($id);
        $surgery->delete();
        Flash::error('Cirugia Borrada con exito!');
        return redirect()->route('hojamedica.index', ['date' => $surgery->fecha]); 
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

        return view('hojamedica.form_realizada')->with('surgery', $surgery)->with('procedimientos', $procedimientos);
    }
    public function reporte_semanal()
    {
        return view('reportes.semanal');
    }

    public function reporte_semanal_pdf(Request $request)
    {
        $fecha_inicio = fecha_ymd($request->fecha_inicio);
        $fecha_final = fecha_ymd($request->fecha_final);
        $surgerys = Surgery::whereBetween('fecha',[$fecha_inicio,$fecha_final])->orderBy('fecha', 'ASC')->orderBy('horario')->get();
        $surgerys->each(function($surgerys) {
            $surgerys->paciente;
            $surgerys->cirugia;
            $surgerys->medico;
            $surgerys->anestesiologo;
        });
        $mpdf = new mPDF('', 'Legal-L');
        $header = \View('reportes.header_semanal')->with('date', $fecha_inicio)->with('date2', $fecha_final)->render();
        $mpdf->SetFooter('Generado el: {DATE j-m-Y}| Programacion de Cirugias | &copy;'.date('Y').' ISSSTE BAJA CALIFORNIA');
        $html =  \View('reportes.semanal_show')->with('surgerys', $surgerys)->with('date', $date)->render();
        $pdfFilePath = 'Citas del '.fecha_dmy($date).'.pdf';
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';
        $mpdf->setHTMLHeader($header);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
   
        $mpdf->Output($pdfFilePath, "I"); //D


        /* Excel::create('surgerys', function($excel) use($surgerys) {
            $excel->sheet('Sheet 1', function($sheet) use($surgerys) {
                $sheet->loadView('reportes.semanal_show')->with('surgerys', $surgerys);;
            });
        })->export('xls');
        */
    }

    public function reprogramar($id)
    {   
        $surgery = Surgery::find($id);
        $surgery->cirugia;
        $surgery->paciente;
        $surgery->medico;
        $surgery->anestesiologo;

        $cirugias = Cirugia::all()->lists('name', 'id')->toArray();
        asort($cirugias);

        return view('hojamedica.reprogramar')
                ->with('surgery', $surgery)
                ->with('cirugias', $cirugias);
    }

    public function reprogramar_update_store(Request $request, $id)
    {
        $surgery = Surgery::find($id);
        $surgery->reprogramada = 1;
        $surgery->horario = 0;
        $surgery->anestesiologo_id = 7;
        $surgery->fecha = fecha_ymd($request->fecha);
        $surgery->fecha_repro = fecha_ymd($request->fecha_repro);
        $surgery->observaciones = $request->observaciones;
        $medico_id = \Auth::user()->medico_id;
        $surgery->medico_id = $medico_id;

        $surgery->save();

        return redirect()->route('hojamedica.index', ['date' => $surgery->fecha]); 
    }

    public function suspender($id)
    {
        $surgery = Surgery::find($id);
        $surgery->paciente;

        return view('hojamedica.suspender')->with('surgery', $surgery);
    }

    public function suspender_post(Request $request, $id)
    {
        $cirugia = Surgery::find($id);
        $cirugia->suspendida = 1;
        $cirugia->observaciones = $request->observaciones;
        $cirugia->save();

        return redirect()->route('hojamedica.index', ['date' => $cirugia->fecha]); 
    }


}
