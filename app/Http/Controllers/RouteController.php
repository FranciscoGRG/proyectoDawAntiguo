<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Route_Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class RouteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only('create', 'destroy', 'index2');

    }

    /* Esta funcion se encarga de mostrar la pagina princial de las rutas */
    public function index()
    {
        $categories = Route_Category::all();
        $routes = Route::latest('id')->paginate(5);
        return view('routes.index', compact('routes', 'categories'));
    }

    /* Esta funcion se encarga de mostrar la vista donde se van a crear las rutas */
    public function create()
    {
        $categories = Route_Category::pluck('name', 'id');

        return view('routes.create',compact('categories'));
    }

    /* Esta funcion se encarga de almacenar las nuevas rutas creadas */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'distance' => 'required',
            'unevenness' => 'required',
            'difficulty' => 'required',
            'mapsIFrame' => 'required',
            'location' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'slug' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
        ]);

        $route = Route::create(['title' => $request->title,
                                'description' => $request->description,
                                'distance' => $request->distance,
                                'unevenness' => $request->unevenness,
                                'difficulty' => $request->difficulty,
                                'mapsIFrame' => $request->mapsIFrame,
                                'location' => $request->location,
                                'fecha' => $request->fecha,
                                'hora' => $request->hora,
                                'slug' => $request->slug,
                                'user_id' => $request->user_id,
                                'category_id' => $request->category_id]);

        if($request->file('file')){
            $url = Storage::put('images', $request->file('file'));

            $route->images()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('route.index2');
    }

    /* Esta funcion se encarga de mostrar la ruta que seleccione el usuario */
    public function show(Route $route)
    {
        $autor = User::find($route->user_id);
        return view('routes.show', compact('route', 'autor'));
    }

    /* Esta funcion se encarga de mostrar la vista en donde se va a modificar los datos de una ruta */
    public function edit(Route $route)
    {
        $categories = Route_Category::pluck('name', 'id');

        return view('admin.routes.edit', compact('route', 'categories'));
    }

    /* Esta funcion se encarga de actualizar los cambios aplicados a una ruta */
    public function update(Request $request, Route $route)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'distance' => 'required',
            'unevenness' => 'required',
            'difficulty' => 'required',
            'mapsIFrame' => 'required',
            'location' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'slug' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
        ]);

        $route->update(['title' => $request->title,
                        'description' => $request->description,
                        'distance' => $request->distance,
                        'unevenness' => $request->unevenness,
                        'difficulty' => $request->difficulty,
                        'mapsIFrame' => $request->mapsIFrame,
                        'location' => $request->location,
                        'fecha' => $request->fecha,
                        'hora' => $request->hora,
                        'slug' => $request->slug,
                        'user_id' => $request->user_id,
                        'category_id' => $request->category_id
        ]);

        if($request->file('file')){
            $url = Storage::put('images', $request->file('file'));
            
            if($route->image){
                Storage::delete($route->images->url);

                $route->images->update([
                    'url' => $url
                ]);
            }
            else{
                $route->images()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('route.index2');

/*         if($request->tags){
            $route->tags()->sync($request->tags);
        } */
    }

    /* Esta funcion se encarga de eliminar una ruta */
    public function destroy(Route $route)
    {
        $route->delete();

        return redirect()->route('route.index2');
    }

    /* Esta funcion se encarga de mostrar las rutas creadas por el usuario logeado */
    public function index2(){
        $routes = Route::where('user_id', auth()->user()->id)->paginate(50);
        return view('admin.routes.index', compact('routes'));
    }

    /* Esta funcion muestra las ofertas filtradas por categorias */
    public function category(Route_category $category){
        $routes = Route::where('category_id', $category->id)
                            ->paginate(5);
        return view('routes.category', compact('routes'));
    }
}
