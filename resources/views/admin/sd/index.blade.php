@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Lista de Entradas
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="">
                                <tr>
                                    <th width="20px">ID</th>
                                    <th >Nombre</th>
                                    <th colspan="3" class="text-center">
                                        <a href="{{ route('posts.create') }}" class="btn btn-sm btn-link text-decoration-none text-primary">Añadir+</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td scope="row">{{ $post->id }}</td>
                                        <td>{{ $post->name }}</td>
                                        <td width='30px'class="px-1">
                                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-link text-decoration-none text-dark">Ver</a>
                                        </td>
                                        <td width='30px'class="px-1">
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-link text-decoration-none text-secondary">Editar</a>
                                        </td>
                                        <td width='30px'class="px-1">
                                            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
                                                <button class="btn btn-sm  btn-link text-decoration-none text-danger">Eliminar</button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection