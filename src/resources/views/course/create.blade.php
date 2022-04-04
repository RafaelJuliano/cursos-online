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


    <h2 class="card-title">Cadastrar novo Curso</h2>
    <form action="{{ route('cursos.store') }}" method="POST">
        {{ csrf_field() }}

        <!-- Course Data -->
        
        <div class="row">
            <div class="form-group col-10">
                <label for="title">Título do Curso</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="HTML5 + CSS3" required maxlength="120" >                
            </div>
            <div class="form-group col-2">
                <label for="reference">Referência</label>
                <input type="text" class="form-control" id="reference" name="reference" placeholder="H5CS3" required maxlength="8">
            </div>
        </div>
        <div class="form-group">
            <label for="description">Descrição do Curso</label>
            <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
        </div>
        

        <!-- Module Data -->   
        <h3>Módulos do Curso</h3>
        <a data-toggle="collapse" href=".collapse.show" role="button" aria-expanded="false" aria-controls="collapse">Fechar guias</a>
        <div id="modules-list">
            <div class="card p-3 mb-2 module-container">            
                
                <a class="col-12 p-0 text-secondary" style="text-decoration:none" data-toggle="collapse" href="#module_collapse_0" role="button" aria-expanded="false" aria-controls="module_collapse_0">
                    <h5 class="col-12 p-0" id="module-title-0">Módulo 1</h5>
                </a>

                <div class="collapse show" id="module_collapse_0">
                    <div class="form-group">
                        <label for="modules[0][title]">Título do Módulo</label>
                        <input type="text" class="form-control" id="modules[0][title]" name="modules[0][title]" placeholder="Introdução" onblur="changeModuleTitle(0)" required maxlength="120">                
                    </div>
                    <div class="form-group">
                        <label for="modules[0][description]">Descrição</label>
                        <textarea class="form-control" id="modules[0][description]" name="modules[0][description]" rows="2" required></textarea>
                    </div>

                    <!-- Content Data -->  
                    <div id="content-list-0">
                        <div class="container bg-light p-3 rounded content-container-0" id="content-id-0-0">
                            <a class="col-12 p-0 text-dark" style="text-decoration:none" data-toggle="collapse" href="#content_collapse_0_0" role="button" aria-expanded="false" aria-controls="content_collapse_0_0">
                                <h5 class="col-12 p-0" id="content-title-0-0">Conteúdo 1</h5>
                            </a>

                            <div class="collapse show" id="content_collapse_0_0">
                                <div class="form-group">
                                    <label for="modules[0][contents][0][title]">Título</label>
                                    <input type="text" class="form-control" id="modules[0][contents][0][title]" name="modules[0][contents][0][title]" onblur="changeContentTitle(0, 0)" required maxlength="120">                
                                </div>
                                <div class="form-group">
                                    <label for="modules[0][contents][0][content]">Conteúdo</label>
                                    <textarea class="form-control" id="modules[0][contents][0][content]" name="modules[0][contents][0][content]" rows="5" required></textarea>
                                </div>
                            </div>
                        </div>                       
                    </div>
                    
                    <button onclick="addNewContent(0)" type="button" class="btn btn-outline-secondary mt-2">Adicionar Conteúdo</button>

                </div>
            </div>
        </div>    
        <div class="m-2 p-2 d-flex justify-content-center">
            <button onclick="addNewModule()" type="button" class="btn btn-outline-secondary">Adicionar Módulo</button>
        </div>
        
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

</div>

@endsection