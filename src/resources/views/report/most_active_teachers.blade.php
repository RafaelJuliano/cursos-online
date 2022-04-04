@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <h2>Professores que mais criaram cursos</h2>               
    </div>
    
    <table class="table table-striped">
        <thead>
            <tr>      
            <th scope="col">Nome do Professor</th>
            <th scope="col">Total de cursos cadastrados</th>            
            </tr>
        </thead>
        <tbody>
        @foreach($querry as $line)
            <tr>                
                <th scope="row">{{ $line->name }} </th>
                <td>{{ $line->total }}</td>                
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection