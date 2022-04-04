@extends('layouts.app')

@section('content')
<div class="container">

    @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>            
        @endif

        @if($errors->any())
            <div class="error alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif


    <h2 class="card-title">Editar Curso</h2>
    <form action="{{ route('cursos.update', $course->id) }}" method="POST">
        {{ csrf_field() }}

        <!-- Course Data -->
        
        <div class="row">            
            <div class="form-group col-10">
                <label for="title">Título do Curso</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $course->title }}" required maxlength="120">                
            </div>
            <div class="form-group col-2">
                <label for="reference">Referência</label>
                <input type="text" class="form-control" id="reference" name="reference" value="{{ $course->reference }}" required maxlength="8">
            </div>
        </div>
        <div class="form-group">
            <label for="description">Descrição do Curso</label>
            <textarea class="form-control" id="description" name="description" rows="5" required>{{ $course->description }}
            </textarea>
        </div>
        

        <!-- Module Data -->   
        <h3>Módulos do Curso</h3>
        <a data-toggle="collapse" href=".collapse.show" role="button" aria-expanded="false" aria-controls="collapse">Fechar guias</a>
        
                
            <div id="modules-list">
                @foreach($course->modules as $key => $module)    
                <div class="card p-3 mb-2 module-container">            
                    <div class="row pl-3 d-flex justify-content-between">  
                        <a class="col-10 p-0 text-secondary" style="text-decoration:none" data-toggle="collapse" href="#module_collapse_{{ $key }}" role="button" aria-expanded="false" aria-controls="module_collapse_{{ $key }}">
                            <h5 class="col-12 p-0" id="module-title-{{ $key }}">Módulo: {{ $module->title }}</h5>
                        </a>                        
                        
                    </div>
                    <div class="collapse show" id="module_collapse_{{ $key }}">
                        <div class="form-group">
                            <label for="modules[{{ $key }}][title]">Título do Módulo</label>
                            <input type="hidden" name="modules[{{ $key }}][id]" value="{{ $module->id }}">
                            <input type="text" class="form-control" id="modules[{{ $key }}][title]" name="modules[{{ $key }}][title]" value="{{ $module->title }}" onblur="changeModuleTitle({{ $key }})" required maxlength="12">                
                        </div>
                        <div class="form-group">
                            <label for="modules[{{ $key }}][description]">Descrição</label>
                            <textarea class="form-control" id="modules[{{ $key }}][description]" name="modules[{{ $key }}][description]" rows="2" required>{{ $module->description }}
                            </textarea>
                        </div>

                        <!-- Content Data -->  
                        <div id="content-list-{{ $key }}">
                            @foreach($module->contents as $ckey => $content)
                            <div class="container bg-light p-3 rounded content-container-{{ $key }}" id="content-id-{{ $key }}-{{ $ckey }}">
                                <div class="row pl-3 d-flex justify-content-between">
                                    <a class="col-10 p-0 text-dark" style="text-decoration:none" data-toggle="collapse" href="#content_collapse_{{ $key }}_{{ $ckey }}" role="button" aria-expanded="false" aria-controls="content_collapse_{{ $key }}_{{ $ckey }}">
                                        <h5 class="col-12 p-0" id="content-title-{{ $key }}-{{ $ckey }}">Conteúdo: {{ $content->title }}</h5>
                                    </a>
                                    
                                </div>

                                <input type="hidden" name="modules[{{ $key }}][contents][{{ $ckey }}][id]" value="{{ $content->id }}">

                                <div class="collapse show" id="content_collapse_{{ $key }}_{{ $ckey }}">
                                    <div class="form-group">
                                        
                                        <label for="modules[{{ $key }}][contents][{{ $ckey }}][title]">Título</label>
                                        <input type="text" class="form-control" id="modules[{{ $key }}][contents][{{ $ckey }}][title]" name="modules[{{ $key }}][contents][{{ $ckey }}][title]" onblur="changeContentTitle({{ $key }}, {{ $ckey }})" value="{{ $content->title }}" required maxlength="120">                
                                    </div>
                                    <div class="form-group">
                                        <label for="modules[{{ $key }}][contents][{{ $ckey }}][content]">Conteúdo</label>
                                        <textarea class="form-control" id="modules[{{ $key }}][contents][{{ $ckey }}][content]" name="modules[{{ $key }}][contents][{{ $ckey }}][content]" rows="5" required>{{ $content->content }}</textarea>
                                    </div>
                                </div>
                            </div>  
                            @endforeach                     
                        </div>
                        
                        <button onclick="addNewContent({{ $key }})" type="button" class="btn btn-outline-secondary mt-2">Adicionar Conteúdo</button>

                    </div>
                </div>
                @endforeach 
            </div>              
            <div class="m-2 p-2 d-flex justify-content-center">
                <button onclick="addNewModule()" type="button" class="btn btn-outline-secondary">Adicionar Módulo</button>
            </div>
        
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

</div>

@endsection