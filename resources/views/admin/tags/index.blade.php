@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Lista de etiquetas
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="">
                                <tr>
                                    <th width="20px">ID</th>
                                    <th >Nombre</th>
                                    <th colspan="3" class="text-center">
                                        <a href="{{ route('tags.create') }}" class="btn btn-sm btn-link text-decoration-none text-primary">Añadir+</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td scope="row">{{ $tag->id }}</td>
                                        <td>{{ $tag->name }}</td>
                                        {{-- <td width='5px'>
                                            <a href="{{ route('tags.show', $tag->id) }}" class="btn btn-sm btn-outline-secondary">Ver</a>
                                        </td> --}}
                                        <td width='30px'class="px-1">
                                            <a href="{{ route('tags.show', $tag->id) }}" class="btn btn-sm btn-link text-decoration-none text-dark">Ver</a>
                                        </td>
                                        <td width='30px'class="px-1">
                                            <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-sm btn-link text-decoration-none text-secondary">Editar</a>
                                        </td>
                                        <td width='30px'class="px-1">
                                            {!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) !!}
                                                <button class="btn btn-sm  btn-link text-decoration-none text-danger">Eliminar</button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $tags->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection