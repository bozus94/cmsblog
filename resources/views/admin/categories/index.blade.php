@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Lista de Categorias
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="">
                                <tr>
                                    <th width="20px">ID</th>
                                    <th >Nombre</th>
                                    <th colspan="3" class="text-center">
                                        @can('categories.create')
                                            <a href="{{ route('categories.create') }}" class="btn btn-sm btn-link text-decoration-none text-primary">Añadir+</a>
                                        @endcan
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td scope="row">{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        @can('categories.show')
                                            <td width='30px'class="px-1">
                                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-link text-decoration-none text-dark">Ver</a>
                                            </td>
                                        @endcan
                                        @can('categories.edit')
                                            <td width='30px'class="px-1">
                                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-link text-decoration-none text-secondary">Editar</a>
                                            </td>
                                        @endcan
                                        @can('categories.destroy')
                                            <td width='30px'class="px-1">
                                                {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
                                                    <button class="btn btn-sm  btn-link text-decoration-none text-danger">Eliminar</button>
                                                {!! Form::close() !!}
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                            
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection