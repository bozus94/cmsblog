
{!! Form::hidden('user_id', Auth::user()->id) !!}

<div class="form-group">
    {{ Form::label('name', 'Nombre de la etiqueta')  }}
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>

<div class="form-group">
    {{ Form::label('email', 'Email')  }}
    {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) }}
</div>

<div class="form-group">
    {!! Form::label('roles', 'Roles') !!}
    <br>
    @foreach ($roles as $role)
        <div class="custom-control custom-switch">
            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'custom-control-input', 'id' => $role->name]) !!}
            {!! Form::label($role->name, $role->name, ['class' => 'custom-control-label']) !!}
        </div>
    @endforeach
</div>

<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>
