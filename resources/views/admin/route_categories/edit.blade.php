@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar categoria {{$route_category->name}}</h1>
@stop

@section('content')
    {{-- Aqui creo un formulario para editar el nombre de una categoria para las rutas --}}
    <div class="card">
        <div class="card-body">
            {!! Form::model($route_category,['route' => ['route_categories.update', $route_category], 'method' => 'put', 'autocomplete' => 'off']) !!}

            <div class="form group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoria']) !!}
            
            </div>
            {{-- ['offer_categories.update', $Offer_Category] --}}
            <br>

            {!! Form::submit('Editar categoria', ['class' => 'btn btn-primary']) !!}


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

