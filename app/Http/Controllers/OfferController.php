<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Offer_Category;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class OfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only('create', 'destroy', 'index2');

    }

    /* Esta funcion se encarga de mostrar la vista principal de las ofertas */
    public function index()
    {
        $offers = Offer::latest('id')->paginate(5);
        $categories = Offer_Category::all();
        return view('offers.index', compact('offers', 'categories'));
    }

    /* Esta funcion se encarga de mostrar la vista principal para crear nuevas ofertas */
    public function create()
    {
        $categories = Offer_Category::pluck('name', 'id');

        return view('admin.offers.create',compact('categories'));
    }

    /* Esta funcion se encarga de guardar en la base de datos las nuevas ofertas creadas */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'slug' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
            
        ]);


        $offer = Offer::create(['name' => $request->name,
                                'description' => $request->description,
                                'price' => $request->price,
                                'slug' => $request->slug,
                                'user_id' => $request->user_id,
                                'category_id' => $request->category_id]);

        if($request->file('file')){
            $url = Storage::put('images', $request->file('file'));

            $offer->images()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('offer.index2');
    }

    /* Esta funcion se encarga de mostrar la vista que va a mostrar todas las ofertas creadas */
    public function show(Offer $offer)
    {
        $autor = User::find($offer->user_id);
        return view('offers.show', compact('offer', 'autor'));
    }

    /* Esta funcion se encarga de mostrar la vista en la que se va a editar una oferta */
    public function edit(Offer $offer)
    {
        $categories = Offer_Category::pluck('name', 'id');

        return view('admin.offers.edit', compact('offer', 'categories'));
    }

    /* Esta funcion se encarga de actualizar las ofertas */
    public function update(Request $request, Offer $offer)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'slug' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
            
        ]);
        
        $offer->update(['name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'slug' => $request->slug,
        'user_id' => $request->user_id,
        'category_id' => $request->category_id]);

        if($request->file('file')){
            $url = Storage::put('images', $request->file('file'));
            
            if($offer->image){
                Storage::delete($offer->images->url);

                $offer->images->update([
                    'url' => $url
                ]);
            }
            else{
                $offer->images()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('offer.index2');
    }

    /* Esta funcion se encarga de eliminar las ofertas */
    public function destroy(Offer $offer)
    {
        $offer->delete();

        return redirect()->route('offer.index2');
    }

    /* Esta funcion se encarga de mostrar la vista que va a mostrar las ofertas creada por el usuario logeado */
    public function index2(){
        $offers = Offer::where('user_id', auth()->user()->id)->get(); 
        return view('admin.offers.index', compact('offers'));
    }

    /* Esta funcion va a mostrar la vista que va a mostrar las ofertas con un filtro aplicado por categoria */
    public function category(Offer_category $category){
        $offers = Offer::where('category_id', $category->id)
                            ->paginate(5);
        return view('offer.category', compact('offers'));
    }
}
