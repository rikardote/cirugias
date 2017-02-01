<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistroRequest;
use App\Especialidad;
use App\Tipo;
use App\User;
use App\Medico;
use Laracasts\Flash\Flash;



class RegistroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {	
        if (!\Auth::user()->admin()) {
            return redirect()->route('hojamedica.index');
        }
        $users = User::all();
        return view('users.index')->with('users', $users);
      
    }
    public function create(){
    	//$especialidades = Especialidad::all()->lists('name', 'id')->toArray();
        $medicos = Medico::all()->lists('Fullname', 'id')->toArray();
        asort($medicos);
    	return view('users.create')->with('medicos', $medicos);
    }
     public function edit($id){

     	$user = User::find($id);
     	$user->medico;
        //$especialidades = Especialidad::all()->lists('name', 'id')->toArray();

        //$especialidades_select = $user->especialidades->lists('id')->toArray();
    	//dd($especialidades_select);
    	return view('users.edit')
    		->with('user', $user);
    }
    public function store(RegistroRequest $request){
    	$user = new User($request->all());
    	$user->password = bcrypt($request->password);

        $user->save();

        //$user->especialidades()->sync($request->especialidades);

        Flash::success('Usuario registrado con exito!');
        return redirect()->route('registrar.index');
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
       

        $user->save();
		//$user->especialidades()->sync($request->especialidades);

        Flash::success('Usuario editado con exito!');
        return redirect()->route('registrar.index');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Flash::error('El usuario ' . $user->name . ' ha sido borrado con exito!');
        return redirect()->route('registrar.index');
    } 
    public function theme_get()
    {
        $themes = array('cerulean' => 'cerulean', 'cosmo' => 'cosmo', 'cyborg' => 'cyborg', 'darkly' => 'darkly', 'flatly' => 'flatly', 'journal' => 'journal', 'lumen' => 'lumen', 'paper' => 'paper', 'readable' => 'readable', 'sandstone' => 'sandstone', 'simplex' => 'simplex', 'slate' => 'slate', 'spacelab' => 'spacelab', 'superhero' => 'superhero', 'united' => 'united', 'yeti' => 'yeti');
        return view('admin.themes')->with('themes', $themes);
    }
    public function theme_post(Request $request)
    {
        $user = \Auth::user();
        $user->theme = $request->theme;
        $user->save();
        return redirect()->route('users.theme.get');  
    }
}
