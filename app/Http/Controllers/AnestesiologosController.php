<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\AnestesiologosRequest;

use App\Anestesiologo;

use Laracasts\Flash\Flash;

class AnestesiologosController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {	
       
    	$anestesiologos = Anestesiologo::orderBy('apellido_pat', 'ASC')->get();

           
    	return view('anestesiologos.index')->with('anestesiologos', $anestesiologos);
    }

    public function create()
    {
    	return view('anestesiologos.createorupdate');
        	
    }
 
    public function edit($id)
    {
        $anestesiologo = Anestesiologo::find($id);
        
        return view('anestesiologos.createorupdate')
            ->with('anestesiologo', $anestesiologo);
        
        
    }
    
    public function update(Request $request, $id)
    {
        $anestesiologo = Anestesiologo::find($id);
        $anestesiologo->fill($request->all());

        $anestesiologo->save();
        Flash::success('Anestesiologo editado con exito!');
        return redirect()->route('anestesiologos.index');
    }

    public function store(AnestesiologosRequest $request)
    {
        $anestesiologo = new Anestesiologo($request->all());
        $anestesiologo->save();

        Flash::success('Anestesiologo registrado con exito!');
        return redirect()->route('anestesiologos.index');
    }  

    public function destroy($id)
    {
        $anestesiologo = Anestesiologo::find($id);
        $anestesiologo->delete();

        Flash::error('El Anestesiologo ' . $anestesiologo->name . ' ha sido borrado con exito!');
        return redirect()->route('anestesiologos.index');
    } 
}