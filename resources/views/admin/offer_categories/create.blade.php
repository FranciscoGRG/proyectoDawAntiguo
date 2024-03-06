@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear categoria</h1>
@stop

@section('content')
    {{-- Aqui creo un formulario para crear nuevas categorias para las ofertas --}}
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'offer_categories.store']) !!}

            <div class="form group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoria']) !!}
            
            </div>

            <br>

            {!! Form::submit('Crear categoria', ['class' => 'btn btn-primary']) !!}


            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')

    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
             });
         });
    </script>

@endsection

