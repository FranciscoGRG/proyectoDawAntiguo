@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar un nuevo usuario</h1>
@stop

@section('content')
    Asigna un rol
@stop

@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
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

        //Cambiar la imagen
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {

                document.getElementById("picture").setAttribute('src', event.target.result);

            };

            reader.readAsDataURL(file);

        }
    </script>

@endsection