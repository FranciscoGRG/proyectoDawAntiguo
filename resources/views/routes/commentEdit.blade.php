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
            border: 1px solid;
        }
        
        .contenedor2{
            background-color: rgb(236, 101, 101);
        }

        .contenedor3{
            background-color: rgb(236, 101, 101);
            border: 1px solid;

            margin-top: 0.5rem;
        }

        .p{
            margin-left: 3rem;
        }
        
        
        </style>

    <title>Ruta {{$route->title}}</title>
</head>
<body>
    {{-- Aqui muestro la vista para editar un comentario --}} 
    <x-app-layout>
        <div class="px-6 py-8">
    
            <a href="{{route('route.show', $route)}}"><p class="text-center">Titulo: {{$route->title}}</p></a>
    
            <div class="contendor">
            <iframe src="https://www.google.com/maps/embed?pb=!1m40!1m12!1m3!1d12597.38384498792!2d-4.778062359264087!3d37.8755912634356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m25!3e1!4m5!1s0xd6d2091facd172d%3A0x796f72ed5f4c5b4a!2sSector%20Sur%2C%20C%C3%B3rdoba!3m2!1d37.8670852!2d-4.7808095!4m5!1s0xd6cdf87dfbbf67b%3A0x1980daa0d9160cd6!2sIES%20Galileo%20Galilei%2C%20C.%20Francisco%20Pizarro%2C%2016%2C%2014010%20C%C3%B3rdoba!3m2!1d37.883659!2d-4.758394399999999!4m5!1s0xd6d2082ce1a16cf%3A0xefebc353f81bf636!2sMezquita-Catedral%20de%20C%C3%B3rdoba!3m2!1d37.878905599999996!2d-4.7793868999999995!4m5!1s0xd6cdf8142ac6485%3A0x5cf8e55231bdd37b!2sMercadona!3m2!1d37.8869938!2d-4.7652752!5e0!3m2!1ses!2ses!4v1654705174401!5m2!1ses!2ses" width="1100" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    
            
               
                <div class="contenedor2">
                    
                    
                    
                    <table>
                        <tr>
                            <th><p>Dificultad: {{$route->difficulty}}</p></th>
                            <th><p>Desnivel: {{$route->unevenness}}m</p></th>
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
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:grid-cols-3" style="width: 500px; height:500px;">
                    @foreach($route->images as $image)
                        <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2  @endif" style="background-image: url(@if($image->url) {{Storage::url($image->url)}} @else https://cdn.pixabay.com/photo/2022/04/03/22/05/buildings-7109918_960_720.jpg @endif)"></article>
                    @endforeach
            </div>

            <div class="contenedor3">
                <h1 align="center" ><b>Comentario</b></h1>
                @foreach($route->comments as $comment2)
                        <p>Autor: {{$comment2->user_id}}
                        <p class="p">{{$comment2->message}}</p>

                        @if($comment->id == $comment2->id)

                        <form action="{{ route('comment.update', [$comment, $route])}}" method="POST">
                            @method('put')
                            @csrf
            
                            <input id="id" name="id" type="hidden" value={{$comment->id}}>
            
                            <div class="form-group">
                                <label for="title"></label>
                                <input type="textarea" name="message" id="message" class="form-control" placeholder="Escribe aqui el comentario...">
                            </div>
                
                            <input id="route_id" name="route_id" type="hidden" value={{$route->id}}>
                
                            <input id="user_id" name="user_id" type="hidden" value={{auth()->user()->id}}>
                
                            <button type="submit" class="btn btn-primary">Editar comentario</button>
                        
                        
                        </form>

                        @endif
                        
                    <br>
                @endforeach
            </div>


        


    </div>
        


    </x-app-layout>
</body>
</html>