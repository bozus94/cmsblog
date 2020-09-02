@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                         Editar Usuario

                    </div>
                    <div class="card-body">
                        {!! Form::model($user, ['route' => ['users.update', $user->id],'method' => 'PUT']) !!}

                            @include('admin.users.partials.form')

                        {!! Form::close() !!}
                    </div>
                </div>

               {{--  @if ($user->id === Auth::user()->id)
                <br>
                    <div class="card">
                        <div class="card-header">
                            Editar Password

                        </div>
                        <div class="card-body">

                            {!! Form::model($user, ['route' => ['users.newPassword', $user->id],'method' => 'PUT']) !!}

                                @include('admin.users.partials.editPassword')

                            {!! Form::close() !!}
                        
                        </div>
                    </div>
                @endif --}}
            </div> 
        </div>
    </div>
@endsection
