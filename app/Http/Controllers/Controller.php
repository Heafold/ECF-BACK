<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        return view('home', [
            'products' => Product::take(3)->get(),
            'fav' => Product::where('favorite', 1)->take(1)->get(),
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
}
