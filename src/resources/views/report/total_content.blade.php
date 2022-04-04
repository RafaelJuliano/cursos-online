@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between">
        <h2>Totais de cursos cadastrados</h2>               
    </div>
    
    <table class="table table-striped">
        <thead>
            <tr>      
            <th scope="col">Curso</th>
            <th scope="col">Referência</th>
            <th scope="col">Total de Módulos</th>
            <th scope="col">Total de Conteúdos</th>
            </tr>
        </thead>
        <tbody>
        @foreach($querry as $line)
            <tr>                
                <th scope="row">{{ $line->course }} </th>
                <td>{{ $line->reference }}</td>
                <td>{{ $line->modules }}</td>
                <td>{{ $line->contents }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection