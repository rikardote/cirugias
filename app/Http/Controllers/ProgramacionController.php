<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
use App\Surgery;

class ProgramacionController extends Controller
{
    public function index()
    {
    	$today = Carbon::today();
    	$cirugias = Surgery::all();
    	return view('programar_cirugia.index')->with('today', $today)->with('cirugias', $cirugia);
    }
}
