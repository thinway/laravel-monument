<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Monumento;
use App\Opinione;

class OpinionesController extends Controller
{
    public function store(Request $request, Monumento $monumento)
    {
      $opinion = new Opinione( $request->all() );

      $opinion->usuario_id = 1;

      $monumento->addOpinione( $opinion );

      return back();
    }

    public function edit(Opinione $opinione)
    {
        return view('opiniones.edit', compact('opinione') );
    }

    public function update(Request $request, Opinione $opinione)
    {
      $opinione->update( $request->all() );

      return redirect('monumentos/' . $opinione->monumento_id);
    }

    public function delete(Opinione $opinione)
    {
      $monumento_id = $opinione->monumento_id;

      $opinione->delete();

      return redirect('monumentos/' . $monumento_id);
    }
}
