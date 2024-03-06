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
            margin-bottom: 0.5rem;
        }

        .contenedor3{
            background-color: rgb(236, 101, 101);
            border: 1px solid;

            margin-top: 0.5rem;
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

    <title>Oferta {{$offer->name}}</title>
</head>
<body>
    {{-- Aqui muestro una oferta seleccionada por un usuario --}}
    <x-app-layout>
        <div class="px-6 py-8">
    
            <div class="imagenes">
{{--                 <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:grid-cols-3" style="width: 500px; height:500px;">
                    @foreach($offer->images as $image)
                        <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2  @endif" style="background-image: url(@if($image->url) {{Storage::url($image->url)}} @else https://cdn.pixabay.com/photo/2022/04/03/22/05/buildings-7109918_960_720.jpg @endif)"></article>
                    @endforeach --}}
                    <div class="grid-container">
                        @foreach($offer->images as $image)
                            <div class="grid-item">
                               <img src="{{Storage::url($image->url)}}" alt=""> 
                            </div>
    
                        @endforeach
                    </div>
            </div>
    
    
            <div class="contendor">
               
                <div class="contenedor2">                  
                    <p style="font-size: xx-large">Precio: {{$offer->price}}€</p>
                    <p style="font-size: x-large">Titulo: {{$offer->name}}</p>
                    <p style="font-size: x-large">Autor: {{$autor->first_name}}</p>
                    <p style="font-size: x-large">Telefono: {{$autor->phone}}</p>
                </div>

                <p>{{$offer->description}}</p>
            </div>
        </div>


    </x-app-layout>
</body>
</html>