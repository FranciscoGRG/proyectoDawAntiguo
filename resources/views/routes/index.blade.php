<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <style>
    .tabla{
      margin-left: 40%;
    }


  </style>
</head>
<body>
  {{-- Aqui muestro todas las rutas --}}
  <x-app-layout>

    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-bold">Rutas</h1>
        <hr size="20px" color="black">
        <br>

        <table class="tabla">
          <tr>
       @foreach ($categories as $category)       
            <th class="th">
              <a href="{{route('route.category', $category)}}">{{$category->name}}</a> &nbsp &nbsp &nbsp
            </th>
       @endforeach
      </tr>
      </table>

        @foreach ($routes as $route)      
            <x-card-route :route="$route"> </x-card-route>
        @endforeach

        <div class="mt-4">
            {{$routes->links()}}
        </div>
    

    </div>
    
    </x-app-layout>
</body>
</html>