@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between">
        <h2>Ambiente Virutal de Aprendizagem</h2> 
    </div>
    <hr>
    <div class="d-flex justify-content-between">
        <h4>Módulo: {{ $module->title }}</h4> 
    </div>
    <ul class="list-group">
        @foreach($module->contents as $content)
            <li class="list-group-item d-flex justify-content-between">
                <span>{{ $content->title }}</span>
                <a href="{{ route('ava.content', $content->id) }}">Acessar</a>
            </li>
        @endforeach
    </ul>



</div>
@endsection