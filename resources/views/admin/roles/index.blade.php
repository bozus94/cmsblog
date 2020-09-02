@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Lista de Roles
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="">
                                <tr>
                                    <th width="20px">ID</th>
                                    <th >Nombre</th>
                                    <th colspan="3" class="text-center">
                                        @can('roles.create')
                                            <a href="{{ route('roles.create') }}" class="btn btn-sm btn-link text-decoration-none text-primary">Añadir+</a>
                                        @endcan
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td scope="row">{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        @can('roles.show')
                                            <td width='30px'class="px-1">
                                                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-sm btn-link text-decoration-none text-dark">Ver</a>
                                            </td>
                                        @endcan
                                        @can('roles.edit')
                                            <td width='30px'class="px-1">
                                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-link text-decoration-none text-secondary">Editar</a>
                                            </td>
                                        @endcan
                                        @can('roles.destroy')
                                            <td width='30px'class="px-1">
                                                {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'DELETE']) !!}
                                                    <button class="btn btn-sm  btn-link text-decoration-none text-danger">Eliminar</button>
                                                {!! Form::close() !!}
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                            
                        {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection