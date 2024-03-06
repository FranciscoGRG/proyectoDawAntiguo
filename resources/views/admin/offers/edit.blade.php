@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar una oferta</h1>
@stop

@section('content')
    {{-- Aqui creo un formulario para editar los datos de una ruta --}}
    <div-card>
        <div class="card-body">
            {!! Form::model($offer,['route' => ['offer.update', $offer], 'method' => 'put', 'autocomplete' => 'off', 'files' => true]) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del articulo']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Descripcion:') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descripcion de la oferta: ']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('price', 'Precio:') !!}
                    {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Precio del articulo:'] ) !!}
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

                <div class = "col">
                    <div class="form-group">
                        {!! Form::label('file', 'Imagen del articulo') !!}
                        {!! Form::file('file', ['class' => 'form-control-file']) !!}
                    </div>

                {!! Form::submit('Editar oferta', ['class' => 'btn btn-primary']) !!}

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
        $("#name").stringToSlug({
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