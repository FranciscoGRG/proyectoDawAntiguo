<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Route_Category;

class Route_CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only('create', 'destroy', 'index');
    }
    
    /* Este metodo se encarga de mostrar la pagina principal de las categorias de las rutas */
    public function index()
    {
        $categories = Route_Category::paginate(10);

        return view('admin.route_categories.index', compact('categories'));
    }

    /* Este metodo se encarga de mostrar la pagina en la que se crean las categorias de las rutas */
    public function create()
    {
        return view('admin.route_categories.create');
    }

    /* Este metodo se encarga de guardar en la base de datos la nueva categoria creada */
    public function store(Request $request)
    {
        Route_Category::create($request->all());

        return redirect()->route('route_categories.index');
    }

    /* Este metodo se encarga de mostrar la pagina en la que se editan las categorias */
    public function edit(Route_Category $route_category)
    {
        return view('admin.route_categories.edit', compact('route_category'));
    }

    /* Este metodo se encarga de actualizar las categorias en la base de datos */
    public function update(Request $request, Route_Category $route_category)
    {
        $route_category->update($request->all());

        return redirect()->route('route_categories.index');
    }

    /* Este metodo se encarga de eliminar la categoria de la base de datos */
    public function destroy(Route_Category $route_category)
    {
        $route_category->delete();

        return redirect()->route('route_categories.index');
    }
}
