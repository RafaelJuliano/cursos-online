@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between">
        <h2>Todos os conteúdos</h2>               
    </div>
    
    <table class="table table-striped">
        <thead>
            <tr>      
                <th scope="col">Conteúdo</th>
                <th scope="col">Módulo</th>
                <th scope="col">Curso</th>
                <th scope="col">Visualizações</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($querry as $line)
            <tr>                
                <th scope="row">{{ $line->content }} </th>
                <td>{{ $line->module }}</td>
                <td>{{ $line->course }}</td>
                <td>{{ $line->views }}</td>
                <td>
                    <a href="{{ route('relatorios.content_views', $line->id) }}">Visualizações</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection