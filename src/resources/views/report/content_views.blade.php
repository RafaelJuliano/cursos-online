@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between">
        <h2>Visualizações de {{ $querry[0]->title }}</h2>               
    </div>
    
    <table class="table table-striped">
        <thead>
            <tr>      
                <th scope="col">Usuário</th>
                <th>Data e Hora</th>                
            </tr>
        </thead>
        <tbody>
        @foreach($querry as $line)
            <tr>                
                <td scope="row">{{ $line->name }} </th> 
                <td>{{ $line->created_at }}</td> 

            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection