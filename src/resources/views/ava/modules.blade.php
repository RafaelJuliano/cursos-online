@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between">
        <h2>Ambiente Virutal de Aprendisagem</h2> 
    </div>
    <hr>
    <div class="d-flex justify-content-between">
        <h4>Curso: {{ $course->title }}</h4> 
    </div>
    <ul class="list-group">
        @foreach($course->modules as $module)
            <li class="list-group-item d-flex justify-content-between">
                <span>{{ $module->title }}</span>
                <a href="{{ route('ava.contents', $module->id) }}">Acessar</a>
            </li>
        @endforeach
    </ul>



</div>
@endsection