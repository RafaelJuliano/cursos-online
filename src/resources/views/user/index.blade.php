@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between">
        <h2>Usuários</h2>                     
    </div>        

    <table class="table table-striped">
        <thead>
            <tr>      
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Permissão</th>
            <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            
                <tr>                
                    <th scope="row">{{ $user->name }} </th>
                    <td>{{ $user->email }}</td>
                    <td>
                        @switch($user->role)
                            @case('admin')
                                Administrador
                                @break
                            @case('teacher')
                                Professor
                                @break
                            @case('student')
                                Aluno
                                @break
                            @default
                                Não definido                                
                        @endswitch
                    </td>
                    <td>
                        <a href="{{ route('usuarios.show', $user->id) }}" class="text-secondary">Editar</a>
                    </td>   
                </tr>     
                    
        @endforeach
        </tbody>
    </table>
    

</div>
@endsection