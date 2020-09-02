@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                         Ver Role
                    </div>
                    <div class="card-body">
                        <table class="table table-hover mb-0">
                          <tbody>
                            <tr>
                              <th width="90px">Nombre</th>
                                <td>{{ $role->name }} </td>
                            </tr>
                            <tr>
                              <th width="90px">Slug</th>
                                <td>{{ $role->description }}</td>
                            </tr>
                            <tr>
                              <th width="90px">Guard</th>
                                <td>{{ $role->guard_name }}</td>
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