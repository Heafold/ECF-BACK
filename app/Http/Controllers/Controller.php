<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        return view('home', [
            'products' => Product::inRandomorder()->take(3)->get(),
            'fav' => Product::inRandomOrder()->where('favorite', 1)->get(),
            'last' => Product::orderBy('id', 'desc')->take(4)->get(),
        ]);
    }

    public function products(){
        return view('products', [
            'products' => Product::paginate(6),
            'categories' => Category::all(),
            'last' => Product::orderBy('id', 'desc')->take(1)->get(),
            'colors' => Color::all(),
        ]);
    }

    public function product($id){
        return view('product', [
            'product' => Product::findOrFail($id),
            'colors' => Color::all(),
        ]);
    }

    public function category($id){
        return view('category', [
            'category' => Category::findOrFail($id),
            'categories' => Category::all(),
            'products' => Product::where('categories_id', $id)->get(),
            'last' => Product::orderBy('id', 'desc')->take(1)->get(),
            'colors' => Color::all(),
        ]);
    }

    public function admin(){
        return view('admin');
    }

    public function showproducts(){
        return view('adminproducts', [
            'products' => Product::paginate(6),
        ]);
    }

    public function new(){
        return view('adminnewproduct', [
            'categories' => Category::all(),
            'colors' => Color::all(),
        ]);
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|min:3',
        'description' => 'required|string|min:10',
        'price' => 'required|integer|max:1000|min:99',
        'cover' => 'nullable|image',
        'color_id' => 'nullable',
        'color_id' => 'nullable',
        'categories_id' => 'nullable'
        
    ]);

    if ($request->hasFile('cover')) {
        $validated['cover'] = '/storage/'.$request->file('cover')->store('covers');
    }

    Product::create(collect($validated)->all());

    return redirect('/admin');
}

    public function modif($id){
        return view('adminmodif', [
            'product' => Product::findOrFail($id),
            'categories' => Category::all(),
            'colors' => Color::all(),
        ]);
    }

    public function storemod(Product $product, Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'description' => 'required|string|min:10',
            'price' => 'required|integer|max:1000|min:99',
            'cover' => 'nullable|image',
            'color_id' => 'nullable',
            'color_id' => 'nullable',
            'categories_id' => 'nullable'
        ]);

        if ($request->hasFile('cover')) {
            // On supprime l'ancienne image
            if ($product->cover) {
                Storage::delete(str($product->cover)->remove('/storage/'));
            }

            $validated['cover'] = '/storage/'.$request->file('cover')->store('covers');
        }

        $product->update(collect($validated)->all());


        return redirect()->route('admin');
    }
}
