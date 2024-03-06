@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar una ruta</h1>
@stop

@section('content')
    {{-- Aqui creo un formulario para editar una ruta --}}
    <div-card>
        <div class="card-body">
            {!! Form::open(['route' => 'route.store', 'autocomplete' => 'off', 'files' => 'true']) !!}

                <div class="form-group">
                    {!! Form::label('title', 'Titulo:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la ruta']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Descripcion:') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descripcion de la ruta: ']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('distance', 'Distancia:') !!}
                    {!! Form::text('distance', null, ['class' => 'form-control', 'placeholder' => 'Distancia de la ruta:'] ) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('unevenness', 'Desnivel:') !!}
                    {!! Form::text('unevenness', null, ['class' => 'form-control', 'placeholder' => 'Desnivel de la ruta: ']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('difficulty', 'Dificultad:') !!}
                    {!! Form::text('difficulty', null, ['class' => 'form-control', 'placeholder' => 'Dificultad de la ruta: ']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('mapsIFrame', 'Mapa de maps:') !!}
                    {!! Form::text('mapsIFrame', null, ['class' => 'form-control', 'placeholder' => 'Frame del mapa de la ruta: ']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('location', 'Localizacion:') !!}
                    {!! Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Localizacion de la ruta: ']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('fecha', 'Fecha:') !!}
                    {!! Form::text('fecha', null, ['class' => 'form-control', 'placeholder' => 'Fecha de la ruta: ']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('hora', 'Hora:') !!}
                    {!! Form::text('hora', null, ['class' => 'form-control', 'placeholder' => 'Hora de la ruta: ']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('slug', 'Slug:') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug ']) !!}
                </div>

                {!! Form::hidden('user_id', auth()->user()->id) !!}

                <div class="form-group">
                    {!! Form::label('category_id', 'Categoria:') !!}
                    <br>
                    {!! Form::select('category_id', $categories, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Crear ruta', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div-card>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

<script>
    $(document).ready( function() {
        $("#title").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
         });
     });


    ClassicEditor
    .create( document.querySelector( '#extract' ), {
        plugins: [ Essentials, Paragraph, Bold, Italic ],
        toolbar: [ 'bold', 'italic' ]
    } )
    .then( editor => {
        console.log( 'Editor was initialized', editor );
    } )
    .catch( error => {
        console.error( error.stack );
    } );
</script>
@stop