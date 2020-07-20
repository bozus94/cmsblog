
{!! Form::hidden('user_id', Auth::user()->id) !!}

<div class="form-group">
    {{ Form::label('name', 'Nombre de la etiqueta')  }}
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>

<div class="form-group">
    {{ Form::label('slug', 'Ruta amigable')  }}
    {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Categoria') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'custom-select']) !!}
</div>

<div class="form-group">
    {{ Form::label('excerpt', 'Descripcion')  }}
    {{ Form::textarea('excerpt', null, ['class' => 'form-control', 'id' => 'escerpt', 'rows' => 5]) }}
</div>

<div class="form-group">
    {{ Form::label('body', 'Description')  }}
    {{ Form::textarea('body', null, ['class' => 'form-control', 'id' => 'body', 'rows' => 10]) }}
</div>

<div class="form-group">
    {!! Form::label('status', 'Estado') !!}
    <br>
    <div class="custom-control custom-radio custom-control-inline">
        {!! Form::radio('status', 'DRAFT', null, ['class'  => 'custom-control-input', 'id' => 'draft']) !!}
        {!! Form::label('draft', 'Borrador', ['class' => 'custom-control-label']) !!}
    </div>
    <div class="custom-control custom-radio custom-control-inline">
        {!! Form::radio('status', 'PUBLISHED', null, ['class' => 'custom-control-input', 'id' => 'published'] ) !!}
        {!! Form::label('published', 'Publicado', ['class' => 'custom-control-label']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('tags', 'Etiquetas') !!}
    <br>
    @foreach ($tags as $tag)
        <div class="custom-control custom-checkbox custom-control-inline">
            {!! Form::checkbox('tags[]', $tag->id, null, ['class' => 'custom-control-input', 'id' => $tag->name]) !!}
            {!! Form::label($tag->name, $tag->name, ['class' => 'custom-control-label']) !!}
        </div>
    @endforeach
</div>

<div class="form-group">
    {!! Form::label('file', 'Imagen') !!}
    <div class="custom-file">
        {!! Form::file('file', ['class' => 'custom-file-input', 'id' => 'file', 'lang' => 'es']) !!}
        {!! Form::label('file', 'Seleccionar Archivo', ['class' => 'custom-file-label']) !!}
    </div>
</div>

<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>

@section('scripts')
    <script src=" {{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }} "></script>
    <script src=" {{ asset('vendor/stringToSlug/speakingurl.min.js') }} "></script>

    <script>
       $( document ).ready(function() {
            $('#name').stringToSlug({
                getPut: '#slug'
            })
        });
    </script>
@endsection