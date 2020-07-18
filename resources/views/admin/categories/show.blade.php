@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                         Ver Categoria

                    </div>
                    <div class="card-body">
                        <table class="table table-hover mb-0">
                          <tbody>
                            <tr>
                              <th width="90px">Nombre</th>
                                <td>{{ $category->name }} </td>
                            </tr>
                            <tr>
                              <th width="90px">Slug</th>
                                <td>{{ $category->slug }}</td>
                            </tr>
                            <tr>
                              <th width="90px">Body</th>
                                <td>{{ $category->body }}</td>
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