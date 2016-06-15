<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;

class ProgramacionController extends Controller
{
    public function index()
    {
    	$today = Carbon::today();
    	$cirugias = Programa
    	return view('programar_cirugia.index')->with('today', $today);
    }
}
