<div class="form-group">
    {{ Form::label('name', 'Nombre')  }}
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'Descripcion')  }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'rows' => '3']) }}
</div>

<div class="form-group">
    {!! Form::label('permissions', 'permissions') !!}
    <br>
    @foreach ($permissions as $permission)
        <div class="custom-control custom-switch">
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'custom-control-input', 'id' => $permission->name]) !!}
            {!! Form::label($permission->name, $permission->description, ['class' => 'custom-control-label']) !!}
        </div>
    @endforeach
</div>

<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>
