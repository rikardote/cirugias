<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\MedicosRequest;

use App\Medico;
use App\Especialidad;

use Laracasts\Flash\Flash;

class MedicosController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {	
       
    	$medicos = Medico::orderBy('apellido_pat', 'ASC')->get();
        $medicos->each(function($medicos) {
              $medicos->especialidad;
        });

           
    	return view('medicos.index')->with('medicos', $medicos);
    }

    public function create()
    {
        $especialidades = Especialidad::all()->lists('name', 'id')->toArray();
        asort($especialidades);
    	return view('medicos.createorupdate')->with('especialidades', $especialidades);
        	
    }
 
    public function edit($id)
    {
        $medico = Medico::find($id);
        $medico->especialidad;

        $especialidades = Especialidad::all()->lists('name', 'id')->toArray();
        asort($especialidades);
        
        return view('medicos.createorupdate')
            ->with('medico', $medico)
            ->with('especialidades', $especialidades);
        
        
    }

    public function update(Request $request, $id)
    {
        $medico = Medico::find($id);
        $medico->fill($request->all());

        $medico->save();
        Flash::success('Medico editado con exito!');
        return redirect()->route('medicos.index');
    }

    public function store(MedicosRequest $request)
    {
        $medico = new Medico($request->all());
        $medico->save();

        Flash::success('Medico registrado con exito!');
        return redirect()->route('medicos.index');
    }  

    public function destroy($id)
    {
        $medico = Medico::find($id);
        $medico->delete();

        Flash::error('El Medico ' . $medico->name . ' ha sido borrada con exito!');
        return redirect()->route('medicos.index');
    } 
}