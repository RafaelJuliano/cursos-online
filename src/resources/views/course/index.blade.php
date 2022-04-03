@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex flex-row p-2 justify-content-around">
    @foreach($courses as $course)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $course->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Criado por: {{ $course->createdBy->name }}</h6>
                <p class="card-text">{{ $course->description }}</p>
                <a href="#" class="card-link">Detalhes do Curso</a>            
            </div>
        </div>
    @endforeach
    </div>

</div>
@endsection