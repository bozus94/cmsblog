<div class="form-group">
    {{ Form::label('password', 'Password')  }}
    {{ Form::password('password', ['class' => 'form-control', 'id' => 'password']) }}
</div>

<div class="form-group">
    {{ Form::label('confirmPassword', 'Confirmar Password')  }}
    {{ Form::password('confirmPassword', ['class' => 'form-control', 'id' => 'confirmPassword']) }}
</div>

<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>
