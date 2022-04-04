@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between">
        <h2>Ambiente Virutal de Aprendisagem</h2> 
    </div>
    <hr>
    <div class="d-flex justify-content-between">
        <h4>Conteúdo: {{ $content->title }}</h4> 
    </div>
    
    <p>{{ $content->content }}</p>

    <div class="d-flex justify-content-between">
        @if(!Auth::user()->attendedClasses()->where('content_id', $content->id)->count() > 0)  
            <form action={{ route('usuarios.view', $content->id) }} method="POST">
                @csrf
                <button type="submit" class="btn btn-secondary">Marcar como lido</button>       
            </form>
        @else
            <a href="" class="btn btn-secondary" disable="disable">Marcado como lido</a>
        @endif
        <a href="{{ route('ava.modules', $content->module->course->id) }}" class="btn btn-primary">Voltar</a>
    </div>



</div>
@endsection