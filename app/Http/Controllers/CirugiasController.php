<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CirugiasRequest;

use App\Cirugia;

use Laracasts\Flash\Flash;

class CirugiasController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {	
       
    	$cirugias = Cirugia::orderBy('name', 'ASC')->get();

           
    	return view('cirugias.index')->with('cirugias', $cirugias);
    }
    public function create()
    {
    	return view('cirugias.createorupdate');
        	
    }
 
    public function edit($id)
    {
        $cirugia = Cirugia::find($id);
        
        return view('cirugias.createorupdate')
            ->with('cirugia', $cirugia);
        
        
    }
    
    public function update(Request $request, $id)
    {
        $cirugia = Cirugia::find($id);
        $cirugia->fill($request->all());
        dd($request);
        $cirugia->save();
        Flash::success('Cirugia editado con exito!');
        return redirect()->route('cirugias.index');
    }

    public function store(CirugiasRequest $request)
    {
        $cirugia = new Cirugia($request->all());
        $cirugia->save();

        Flash::success('Cirugia registrado con exito!');
        return redirect()->route('cirugias.index');
    }  

    public function destroy($id)
    {
        $cirugia = Cirugia::find($id);
        $cirugia->delete();

        Flash::error('El Cirugia ' . $cirugia->name . ' ha sido borrado con exito!');
        return redirect()->route('cirugias.index');
    } 
}