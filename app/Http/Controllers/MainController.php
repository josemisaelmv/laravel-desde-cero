<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class MainController extends Controller
{
    //
    public function index(){
        // $name = config('app.name');
        // dump($name);
        // dd("Hello");
        // return view($name);
        // return view('welcome');
        // return view('welcome')->with([
        //     'products' => Product::all(),
        // ]);
        $products = Product::available()->get();
        return view('welcome')->with([
            'products' => $products,
        ]);
    }
}
