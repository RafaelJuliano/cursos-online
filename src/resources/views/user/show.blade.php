@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between">
        <h2>Usuários</h2>                     
    </div>     
    <hr/>   

    <form action="{{ route('usuarios.update', $user->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>                
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>                
        </div>    

        <div class="row">
            <div class="col">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="col">
                <label for="status">Situação</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Ativo</option>
                    <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Inativo</option>
                </select>  
            </div>
            <div class="col">
                <label for="role">Permissão</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrador</option>
                    <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Aluno</option>
                    <option value="teacher" {{ $user->role == 'teacher' ? 'selected' : '' }}>Professor</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Enviar</button>
    </form>
    
</div>    

</div>
@endsection