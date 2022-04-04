@extends('layouts.app')

@section('content')
<div class="container">

    
        <div class="d-flex flex-row flex-wrap justify-content-center">
        @foreach($courses as $course)
            <div class="card m-2 col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12" >
                <div class="card-body d-flex flex-column align-items-stretch">
                    <h5 class="card-title">{{ $course->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Criado por: {{ $course->createdBy->name }}</h6>
                    <p class="card-text" style="max-height: 200px; overflow: hidden; text-overflow: ellipsis;">{{ $course->description }}</p>
                    <a href="{{ route('cursos.show', $course->id) }}" class="card-link mt-auto ">Detalhes do Curso</a>            
                </div>
            </div>
        @endforeach
        </div>
    

</div>
@endsection