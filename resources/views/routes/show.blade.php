<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/main.css">

    <style>
        .contendor{
            background-color: rgb(195, 194, 194);
            border: 1px solid;
            margin-left:20%;
            margin-right: 20%;
            margin-top: 0.5rem;
        }
        
        .imagenes{
            max-width: 80rem;
            margin-left:20%;
            margin-right: 20%;
            margin-bottom: 0.5rem;
            margin-top: 0.5rem;
            border: 2px solid;
        }
        
        .contenedor2{
            background-color: rgb(236, 101, 101);
            border: 2ch;
        }

        .contenedor3{
            max-width: 80rem;
            margin-left:20%;
            margin-right: 20%;
            margin-bottom: 20%;
            margin-top: 0.5rem;
            border: 2px solid;
        }


        .p{
            margin-left: 30rem;
        }

        .p2{
            margin-left: 90%;
        }
        
        .boton{
            float: right;
            display: inline;
            margin-right: 2%;
        }
        
        .iframe{
            width: 880px;
            height: 850px;
        }

        .h1{
            font-size: 200%;
            text-align: center;
            background: rgb(93, 126, 233);
        }

        .h2{
            font-size: 200%;
            text-align: center;
            background: rgb(240, 71, 71);
        }

        .grid-container {
        display: grid;
        grid-template-columns: auto auto auto;
        background-color: #2196F3;
        padding: 10px;
        }
        .grid-item {
        background-color: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(0, 0, 0, 0.8);
        padding: 20px;
        font-size: 30px;
        text-align: center;
        }
        
        </style>

    <title>Ruta {{$route->title}}</title>
</head>
<body>
    {{-- Aqui muestro una ruta seleccionada por el usuario --}}
    <x-app-layout>
        <div class="px-6 py-8">
    
            <a href="{{route('route.show', $route)}}"><p class="text-center" style="font-size:300%;">Titulo: {{$route->title}}</p></a>
    
            <div class="contendor">
            <iframe src="{{$route->mapsIFrame}}" class="iframe"></iframe>
    
            
               
                <div class="contenedor2">   
                    <table>
                        <tr>
                            <th><p>Dificultad: {{$route->difficulty}}</p></th>
                            <th><p class="p">Desnivel: {{$route->unevenness}}m</p></th>
                        </tr>

                        <tr>
                            <th>Distancia: {{$route->distance}}km</th>
                            <th>Ubicacion: {{$route->location}}</th>
                            <th>Autor: {{$autor->first_name}}</th>
                        </tr>
                    </table>
                </div>
               
                <p>{{$route->description}}</p>
            </div>
    
            <div class="imagenes">
                     <h1 class="h1"><b>Imagenes</b></h1>


                <div class="grid-container">
                    @foreach($route->images as $image)
                        <div class="grid-item">
                           <img src="{{Storage::url($image->url)}}" alt=""> 
                        </div>

                    @endforeach
                </div>
            </div>


            <div class="contenedor3">
                <h1 class="h2"><b>Comentarios</b></h1>
                @foreach($route->comments as $comment)
                @if(Auth::check())    
                @if(auth()->user()->id == $comment->user_id)
                        <p>Autor: {{$comment->user_id}}</p>
                        
                         <a href="{{ route('comment.edit', [$route, $comment]) }}" class="boton">Editar</a>
                         <form action="{{ route('comment.destroy', [$comment, $route]) }}" method="POST">
                         @csrf
                         @method('delete')
                         <button type="submit" class="boton">Eliminar</button>
                        </form>
                        @endif
                        <p style="margin-left: 5%">{{$comment->message}}</p>
                    
                    @else
                    <p>Autor: {{$autor->first_name}}</p>
                    <p style="margin-left: 5%">{{$comment->message}}</p>

                    @endif

                    <br>
                @endforeach
            

            
                <p>Añadir comentario</p>
           
        
            @if(Auth::check()) 

        <form action="{{ route('comment.store', $route)}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title"></label>
                <input type="textarea" name="message" id="message" class="form-control" placeholder="Escribe aqui el comentario..." style="width : 1109px; heigth : 3000px;">
            </div>

            <input id="route_id" name="route_id" type="hidden" value={{$route->id}}>

            <input id="user_id" name="user_id" type="hidden" value={{auth()->user()->id}}>

            <button type="submit" class="btn btn-primary">Publicar comentario</button>
        </form>

    </div>

        @else

        <p>Tienes que estar logeado para poder escribir comentarios</p>
        @endif
    </div>
        


    </x-app-layout>
</body>
</html>