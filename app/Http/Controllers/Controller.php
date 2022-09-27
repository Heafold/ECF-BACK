<?php

namespace App\Http\Controllers;

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
}
