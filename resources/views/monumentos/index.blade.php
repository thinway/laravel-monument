@extends('layout')

@section('titulo')
  Monumentos de España
@endsection

@section('contenido')
<!-- Esto es un comentario -->
    <h1>Monumentos</h1>

    @foreach($monumentos as $monumento)
      <div>
        <a href="/monumentos/{{ $monumento->id }}">{{ $monumento->nombre }}</a>
      </div>
    @endforeach
@endsection
