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
                                <td>{{ $user->name }} </td>
                            </tr>
                            <tr>
                              <th width="110px">Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <t>
                              <th width="110px">Roles</th>
                                <td>
                                  <ul class="p-0">
                                    @foreach ($user->roles as $roles)
                                      <li class=" list-unstyled">- {{ $roles->name}}</li>
                                  @endforeach
                                  </ul>
                                </td>
                            </t r>
                          </tbody>
                        </table>
                        <hr class="p-0 m-0">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection