@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between">
        <h2>Ambiente Virutal de Aprendizagem</h2> 
    </div>
    <hr>
    <div class="d-flex justify-content-between">
        <h4>Cursos matriculados</h4> 
    </div>
    <ul class="list-group">
        @foreach($courses as $course)
            <li class="list-group-item d-flex justify-content-between">
                <span>{{ $course->title }}</span>
                <a href="{{ route('ava.modules', $course->id) }}">Acessar</a>
            </li>
        @endforeach
    </ul>

    <div class="d-flex justify-content-between mt-4">
        <h4>Aulas Assistidas</h4> 
    </div>
    <table class="table table-striped">
        <thead>
            <tr>      
            <th scope="col">Conteúdo</th>
            <th scope="col">Módulo</th>
            <th scope="col">Curso</th>
            <th scope="col">Data</th>
            </tr>
        </thead>
        <tbody>
        @foreach(Auth::user()->attendedClasses()->get() as $attendedClass)
            <tr>                
                <th scope="row">{{ $attendedClass->title }} </th>
                <td>{{ $attendedClass->module->title }}</td>
                <td>{{ $attendedClass->module->course->title }}</td>
                <td>{{ $attendedClass->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
    </table>



</div>
@endsection