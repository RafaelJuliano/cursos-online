@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between">
        <h2>Relatórios</h2>               
    </div>
    
    <hr/>

    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{ route('relatorios.most_active_teachers') }}">Professores que mais criaram cursos</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('relatorios.more_complete_courses') }}">Cursos com mais conteúdo</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('relatorios.total_content') }}">Totais de cursos cadastrados</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('relatorios.all_content') }}">Relatório de conteúdos cadastrados</a>
        </li>
    </ul>
</div>
@endsection