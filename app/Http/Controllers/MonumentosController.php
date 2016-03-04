<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Monumento;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class MonumentosController extends Controller
{
    public function index()
    {
      $monumentos = Monumento::all();

      return view('monumentos.index', compact('monumentos') );
    }

    public function show(Monumento $monumento)
    {
      $monumento->load('opiniones.usuario');

      return view('monumentos.show', compact('monumento') );
    }

    public function about()
    {
      return view('about');
    }
}
