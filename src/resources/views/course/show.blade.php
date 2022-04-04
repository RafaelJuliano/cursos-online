@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between">
        <h2>{{ $course->title }}</h2>        

        <div class="d-flex flex-column align-items-end">
            <span class="text-muted">{{ $course->reference }}</span>
            <span class="text-muted">Criador por {{ $course->createdBy->name }}</span>
        </div>
        
    </div>
    
    <hr/>
    <!-- Course Data -->
    <h4>Sobre o Curso</h4>
    <p class="col-10">
        {{ $course->description }}
    </p>

    <h4>Módulos</h4>
    <ul class="list-group">
        @foreach ($course->modules as $module)
            <a data-toggle="collapse" href="#module_collapse_{{ $module->id }}" role="button" aria-expanded="false" aria-controls="module_collapse_0" style="text-decoration: none">   
                <li class="list-group-item d-flex justify-content-between text-secondary">                            
                    <span>{{ $module->title }} </span>                      
                    @if (sizeof($module->contents) == 0)
                        <span>Sem Conteúdos</span>
                    @elseif (sizeof($module->contents)  == 1)
                        <span>1 Conteúdo</span>
                    @else
                        <span>{{ sizeof($module->contents)  }} Conteúdos</span>
                    @endif   
                </li>
            </a>  
            <li class="list-group-item collapse bg-light" id="module_collapse_{{ $module->id }}">
                <p>{{ $module->description }}</p>
            </li>
        @endforeach
    </ul>
    @if(!Auth::user()->subscriptions()->where('course_id', $course->id)->first())
        <a href="{{ route('cursos.subscribe', $course->id) }}" class="btn btn-primary mt-3">Inscrever-se</a>
    @else
        <p class="text-muted mt-3">Matriculado em: {{ Auth::user()->subscriptions()->where('course_id', $course->id)->first()->created_at }}</p>
    @endif

        
    
    


</div>
@endsection
