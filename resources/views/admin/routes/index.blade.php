@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tus rutas</h1>
@stop

@section('content')
{{-- Aqui muestro todas las rutas creadas por el usuario logeado --}}
<div class="card-body">
    <table class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th colspan="2"></th>
        </thead>

        <tbody>
            @foreach($routes as $route)
                <tr>
                    <td>{{ $route->id }}</td>
                    <td>{{ $route->title }}</td>
                    <td width="10px">
                        <a class="btn btn-primary btn-sm" href="{{route('route.edit', $route)}}">Editar</a>
                    </td>
                    <td width="10px">
                        <form action="{{route('route.destroy', $route)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
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