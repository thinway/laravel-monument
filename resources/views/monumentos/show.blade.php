<?php
$state = "";
if( count($errors) ) $state = 'has-error';
?>
@extends('layout')

@section('titulo')
  {{ $monumento->nombre }} - Información
@endsection

@section('contenido')
    <h1>{{ $monumento->nombre }}</h1>
    <p>Ciudad: {{ $monumento->ciudad }}</p>
    <p>Estilo: {{ $monumento->estilo }}</p>
    <p>Siglo: {{ $monumento->siglo }}</p>

    @unless( $monumento->opiniones->isEmpty() )
      <h2>Opiniones</h2>
      <ul class="list-group">
        @foreach($monumento->opiniones as $opinion)
        <li class="list-group-item">{{ $opinion->mensaje }} - Por: {{ $opinion->usuario->nombre }}
          <form style="display: inline" class="pull-right"
            action="{{ url('opiniones/'.$opinion->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <button style="margin-left: 5px; margin-botton: 5px" type="submit"
            class="btn btn-xs btn-danger">
              <span class="glyphicon glyphicon-trash"></span>
            </button>
          </form>
          <a style="margin-left: 5px" class="pull-right"
            href="{{ url('/opiniones/'. $opinion->id . '/edit')}}">
            <span class="glyphicon glyphicon-pencil"></span>
          </a>
        </li>
        @endforeach
      </ul>
    @endunless

    <h3>Comparte tu opinión</h3>

    <form method="POST" action="{{ $monumento->id }}">
      {{ csrf_field() }}
      <div class="form-group {{ $state }}">
        <textarea name="mensaje" class="form-control">{{ old('mensaje') }}</textarea>
      </div>
      @if( count($errors) )
        @foreach($errors->all() as $error)
          <span class="help-block">{{ $error }}</span>
        @endforeach
      @endif
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Añadir Opinión</button>
      </div>
    </form>

    <a href="{{ URL::to('/')}}">Página Principal</a>

@endsection
