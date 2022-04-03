@extends('layouts.app')

@section('content')
<div class="container">

    <h2>Curso</h2>
    {{ $course }}
    
    @foreach($course->modules as $module)
        <h3>Módulo</h3>
        {{ $module }}
        
        @foreach($module->contents as $content)
            <h4>Conteudo</h4>
            {{ $content }}
        @endforeach
    @endforeach
    


</div>
@endsection