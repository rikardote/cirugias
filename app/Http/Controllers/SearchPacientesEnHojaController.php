<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Paciente;
use App\Tipo;
use App\Medico;
use App\Anestesiologo;
use App\Cirugia;
use Carbon\Carbon;
use Laracasts\Flash\Flash;

class SearchPacientesEnHojaController extends Controller
{
		public function __construct()
	    {
	        setlocale(LC_ALL,"es_MX.utf8");
	    }
	    public function index(Request $request, $date)
		{
		 
		   	// Gets the query string from our form submission 
		    $query = $request->rfc;
		    // Returns an array of articles that have the query string located somewhere within 
		    // our articles titles. Paginates them so we can break up lots of search results.
		  	$pacientes = Paciente::where('rfc', '=', $query)->get();
		  	$pacientes->each(function($pacientes) {
          	  $pacientes->tipo;
      		});

	    	$cirugias = Cirugia::all()->lists('name', 'id')->toArray();
	    	asort($cirugias);

		    return view('hojamedica.create')
		    	->with('pacientes', $pacientes)
		    	->with('date', $date)
		    	->with('cirugias', $cirugias);
	 }
	 
}
