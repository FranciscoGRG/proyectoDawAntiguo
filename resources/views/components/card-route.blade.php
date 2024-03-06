@props(['route'])

{{-- Aqui creo un componente para mostrar todas las rutas --}}
<article class="mb-4 ml-4 mr-4 shadow-lg rounded-lg overflow-hidden">

    <div class="px-6 py-8">

        <a href="{{route('route.show', $route)}}"><p class="text-center">Titulo: {{$route->title}}</p></a>

        @foreach ($route->images as $image)
            @if($loop->first)       
                @if($image)
                    <center>
                        <img class="w-40 h-100 object-cover object-center center-block rounded-lg" src="{{Storage::url($image->url)}}" margin:10px auto alt="" width="200" height="200">
                    </center>
                
                    @else
                
                    <center>
                        <img class="w-40 h-100 object-cover object-center center-block rounded-lg " src="https://cdn.pixabay.com/photo/2022/04/03/22/05/buildings-7109918_960_720.jpg" width="200" height="200" margin:10px auto alt="" >
                    </center> 
                @endif
 
            @endif
        @endforeach
    </div>

    <div class="px-6 pt-4 pb-2">
{{--         @foreach ($route->categories as $category)
            <p>Categoria: {{$category->name}}</p>
        @endforeach --}}
        <p>Categoria: {{$route->category->name}}</p>
        <br>
        <p>Dificultad: {{$route->difficulty}}</p>
    </div>
    

</article>