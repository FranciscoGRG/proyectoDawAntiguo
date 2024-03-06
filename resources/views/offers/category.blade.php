<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ofertas</title>
</head>
<body>

    {{-- Aqui muestro las ofertas filtradas por categoria --}}
    <x-app-layout>

        <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
            <h1 class="uppercase text-center text-3xl font-bold">Ofertas</h1>
        
    
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