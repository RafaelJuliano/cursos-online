@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex flex-row flex-wrap p-2 justify-content-start">
    @foreach($courses as $course)
        <div class="card m-2" style="width: 15vw;">
            <div class="card-body d-flex flex-column align-items-stretch">
                <h5 class="card-title">{{ $course->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Criado por: {{ $course->createdBy->name }}</h6>
                <p class="card-text">{{ $course->description }}</p>
                <a href="#" class="card-link mt-auto">Detalhes do Curso</a>            
            </div>
        </div>
    @endforeach
    </div>

</div>
@endsection