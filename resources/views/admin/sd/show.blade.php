@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                         Ver Entrada
                    </div>
                    <div class="card-body">
                        <table class="table table-hover mb-0">
                          <tbody>
                            <tr>
                              <th width="110px">Nombre</th>
                                <td>{{ $post->name }} </td>
                            </tr>
                            <tr>
                              <th width="110px">Slug</th>
                                <td>{{ $post->slug }}</td>
                            </tr>
                            <tr>
                              <th width="110px">Descripcion</th>
                                <td>{{ $post->excerpt }}</td>
                            </tr>
                            <tr>
                              <th width="110px">Body</th>
                                <td>{{ $post->body }}</td>
                            </tr>
                            <tr>
                              <th width="110px">Estado</th>
                                <td>{{ $post->status }}</td>
                            </tr>
                            <tr>
                              <th width="110px">Categoria</th>
                                <td>{{ $post->category->name }}</td>
                            </tr>
                            <tr>
                              <th width="110px">Etiquetas</th>
                                <td>
                                  <ul class="p-0">
                                    @foreach ($post->tags as $tag)
                                      <li class=" list-unstyled">- {{ $tag->name}}</li>
                                  @endforeach
                                  </ul>
                                </td>
                            </tr>
                            <tr>
                              <th width="110px">Imagen Path</th>
                                <td>{{ $post->file }}</td>
                            </tr>
                          </tbody>
                        </table>
                        <hr class="p-0 m-0">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection