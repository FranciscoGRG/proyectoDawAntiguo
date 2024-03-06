@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{route('offer_categories.create')}}">Añadir categoria</a>
    <h1>Categorias para las ofertas</h1>
@stop

@section('content')
{{-- Aqui muestro todas las categorias para las ofertas que a hay --}}
<div class="card-body">
    <table class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th colspan="2"></th>
        </thead>

        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td width="10px">
                        <a class="btn btn-primary btn-sm" href="{{route('offer_categories.edit', $category)}}">Editar</a>
                    </td>
                    <td width="10px">
                        <form action="{{route('offer_categories.destroy', $category)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{$categories->links('pagination::bootstrap-4')}}
    </div>
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