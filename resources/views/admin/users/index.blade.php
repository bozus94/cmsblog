@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Lista de Usuarios
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="">
                                <tr>
                                    <th width="20px">ID</th>
                                    <th >Nombre</th>
                                    {{-- <th colspan="3" class="text-center">
                                        <a href="{{ route('users.create') }}" class="btn btn-sm btn-link text-decoration-none text-primary">Añadir+</a>
                                    </th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td scope="row">{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td width='30px'class="px-1">
                                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-link text-decoration-none text-dark">Ver</a>
                                        </td>
                                        <td width='30px'class="px-1">
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-link text-decoration-none text-secondary">Editar</a>
                                        </td>
                                        <td width='30px'class="px-1">
                                            {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) !!}
                                                <button class="btn btn-sm  btn-link text-decoration-none text-danger">Eliminar</button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection