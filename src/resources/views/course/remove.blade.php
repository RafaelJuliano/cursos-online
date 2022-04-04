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

    <h4>Módulos</h4>
    <ul class="list-group">
        @foreach ($course->modules as $module)
            <li class="list-group-item d-flex justify-content-between text-secondary">   
                <a class="col-10 text-secondary" data-toggle="collapse" href="#module_collapse_{{ $module->id }}" role="button" aria-expanded="false" aria-controls="module_collapse_0" style="text-decoration: none">                                               
                    <span>{{ $module->title }} </span>
                </a>
                <form action="{{ route('module.destroy', $module->id) }}" method="POST" class="method-form col-2 d-flex justify-content-end">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}                   
                        <button type="submit" class="btn btn-outline-danger ml-2 mr-2" onclick="return confirm('Deseja remover o Módulo  {{ $module->title }}?')">Excluir</button>
                </form> 
            </li>
              
             @foreach ($module->contents as $content)
            <li class="list-group-item collapse bg-light" id="module_collapse_{{ $module->id }}">
                <div class="row pl-4 d-flex justify-content-between">
                    <span>{{ $content->title }}</span>
                    <form action="{{ route('content.destroy', $content->id) }}" method="POST" class="method-form col-2 d-flex justify-content-end pr-4">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}                   
                        <button type="submit" class="btn btn-outline-danger ml-2 mr-2" onclick="return confirm('Deseja remover o Conteúdo {{ $content->title }}?')">Excluir</button>
                    </form> 
                </div>
            </li>
            @endforeach
        @endforeach
    </ul>

</div>
@endsection