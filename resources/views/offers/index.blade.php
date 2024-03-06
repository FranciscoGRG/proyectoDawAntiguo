<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ofertas</title>

    <style>
        
    .tabla{
      margin-left: 20%;
      margin-bottom: 2%;
    }


    </style>
</head>
<body>
    {{-- Aqui muestro todas las ofertas --}}
    <x-app-layout>

{{--         <div class="categorias">
                 
                <select name="categorias" id="categorias">
                    @foreach ($categories as $category) 
                    <option value=""><a href="{{route('offer.index')}}">{{$category->name}}</a></option>
                    @endforeach
                </select>
       
        </div> --}}

        

        <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
            <h1 class="uppercase text-center text-3xl font-bold">Ofertas</h1>

            <table class="tabla">
                <tr>
             @foreach ($categories as $category)       
                  <th class="th">
                    <a href="{{route('route.category', $category)}}">{{$category->name}}</a> &nbsp &nbsp &nbsp
                  </th>
             @endforeach
            </tr>
            </table>
        
    
            @foreach ($offers as $offer)      
                <x-card-offer :offer="$offer"> </x-card-route>
            @endforeach
    
            <div class="mt-4">
                {{$offers->links()}}
            </div>
        
    
        </div>
        
        </x-app-layout>
</body>
</html>