<x-app-layout>
    {{-- Aqui muestro las rutas creadas por el usuario --}}
    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-bold">Rutas</h1>
    

        @foreach ($routes as $route)      
            <x-card-route :route="$route"> </x-card-route>
        @endforeach


    

    </div>
    
    </x-app-layout>