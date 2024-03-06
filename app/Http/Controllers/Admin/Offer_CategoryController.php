<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer_Category;

class Offer_CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only('create', 'destroy', 'index');
    }

    /* Este metodo se encarga de mostrar la pagina principal de las categorias de las ofertas */
    public function index()
    {
        $categories = Offer_Category::paginate(10);
        return view('admin.offer_categories.index', compact('categories'));
    }

    /* Este metodo se encarga de mostrar la pagina en la que se crean las categorias de las ofertas */
    public function create()
    {
        return view('admin.offer_categories.create');
    }

    /* Este metodo se encarga de guardar en la base de datos la nueva categoria creada */
    public function store(Request $request)
    {
        Offer_Category::create($request->all());

        return redirect()->route('offer_categories.index');
    }

    /* Este metodo se encarga de mostrar la pagina en la que se editan las categorias */
    public function edit(Offer_Category $offer_category)
    {
        return view('admin.offer_categories.edit', compact('offer_category'));
    }

    /* Este metodo se encarga de actualizar las categorias en la base de datos */
    public function update(Request $request,Offer_Category $offer_category )
    {
        $offer_category->update($request->all());

        return redirect()->route('offer_categories.index');
    }

    /* Este metodo se encarga de eliminar la categoria de la base de datos */
    public function destroy(Offer_Category $offer_category)
    {
        $offer_category->delete();

        return redirect()->route('offer_categories.index');
    }
}
