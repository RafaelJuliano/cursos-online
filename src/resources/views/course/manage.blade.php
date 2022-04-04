@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="d-flex justify-content-between">
            <h2>Meus Cursos</h2>
            <div class="d-flex flex-column align-items-end">
                <a href="{{ route('cursos.create') }}" type="button" class="btn btn-outline-secondary mt-2">Adicionar Curso</a>
            </div>            
        </div>        
        <hr/>

        @foreach ($courses as $course)
            <a data-toggle="collapse" href="#module_collapse_{{ $course->id }}" role="button" aria-expanded="false" aria-controls="module_collapse_0" style="text-decoration: none">   
                <li class="list-group-item d-flex justify-content-between text-secondary">  
                    {{ $course->title }}                    
                </li>
            </a>
            <li class="list-group-item collapse bg-light" id="module_collapse_{{ $course->id }}">
                <p>{{ $course->description }}</p>
                <div class="row">
                    <button class="btn btn-outline-secondary ml-1" onclick="window.location.href='{{ route('cursos.edit', $course->id) }}'">Editar</button>
                    <button class="btn btn-outline-secondary ml-1" onclick="window.location.href='{{ route('cursos.remove', $course->id) }}'">Remover Conteúdo</button>
                    <form action="{{ route('cursos.destroy', $course->id) }}" method="POST" class="method-form">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}                   
                        <button type="submit" class="btn btn-outline-danger ml-2" onclick="return confirm('Deseja remover o curso {{ $course->title }}?')">Excluir</button>
                    </form>
                </div>
            </li>
        @endforeach
    </div>

@endsection