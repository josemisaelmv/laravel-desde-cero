<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function __construct(){
        // permite que las rutas se autentiquen (login)
        $this->middleware('auth');
        // permite que las rutas se autentiquen excepto las que le marquemos en el arreglo de excepcion
        // $this->middleware('auth')->except(['index','create  ']);
    }
    public function index(){
        //$products = DB::table('products')->get();
        // $products = Product::all();
        // return $products;
        // dd($products);
        // return view('products.index');
        return view('products.index')->with([
            'products' => Product::all(),
        ]);
    }

    public function create(){
        //return 'This is the form to create a product form CONTROLLER';
        return view('products.create');
    }

    public function store(ProductRequest $request){
        // //Forma de enviar recibiendo atributos individualmente
        // $product = Product::create([
        //     'title' => request()->title,
        //     'description' => request()->description,
        //     'price' => request()->price,
        //     'stock' => request()->stock,
        //     'status' => request()->status,
        // ]);

        /*
        //  Reglas para validacion
        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:1'],
            'status' => ['required', 'in:available,unavailable'],
        ];

        request()->validate($rules);
        //  Metodo antes de $request
        if(request()->status == 'available' && request()->stock == 0){
            // session()->put('error', 'If available must have stock');
            session()->flash('error', 'If available must have stock');
            // return redirect()->back();
            return redirect()
                    ->back()
                    ->withInput(request()
                    ->all())
                    ->withErrors('If available must have stock');
        }
        */
        /*
        if($request->status == 'available' && $request->stock == 0){
            return redirect()
                    ->back()
                    ->withInput($request
                    ->all())
                    ->withErrors('If available must have stock');
        }
        */
        // dd(request()->all(), $request->all(), $request->validated());
        // session()->forget('error');
        //Forma de enviar recibe todos los atributos de forma masiva mediante fillable
        $product = Product::create(request()->validated());
        session()->flash('success', "The new product with id {$product->id} was created");
        // return $product;
        //redirecciona a la vista anterior
        // return redirect()->back();
        //redirecciona a un action
        //return redirect()->action('MainController@index');
        // //redirecciona a una ruta
        return redirect()
                ->route('products.index')
                ->withSuccess("The new product with id {$product->id} was created");
    }

    public function show(Product $product){
        //$product = DB::table('products')->where('id', $product)->first();
        //$product = DB::table('products')->find($product);
        // $product = Product::findOrFail($product);
        //dd($product);
        //return $product;
        return view('products.show')->with([
            'product' => $product,
            // 'html' => "<h2>Subtitle</h2>"
        ]);
        //return "Showing product with id {$product} from CONTROLLER";
    }

    public function edit(Product $product){
        // return "Showing the form to edit the product with id {$product}" ;
        return view('products.edit')->with([
            // 'product' => Product::findOrFail($product),
            'product' => $product,

        ]);
    }

    public function update(ProductRequest $request, Product $product){
        //
        // dd('en update');
        /*
        //  Reglas para validacion
        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:1'],
            'status' => ['required', 'in:available,unavailable'],
        ];

        request()->validate($rules);
        */

        // $product = Product::findOrFail($product);
        // $product->update(request()->all());
        $product->update(request()->validated());
        // return $product;
        return redirect()
                ->route('products.index')
                ->withSuccess("The product with id {$product->id} was edited");
    }

    public function destroy(Product $product){
        //Aqui se resolvia la busqueda pero ahora directo se resuelve el modelo en el parametro
        // $product = Product::findOrFail($product);
        $product->delete();
        // return $product;
        return redirect()
                ->route('products.index')
                ->withSuccess("The product with id {$product->id} was deleted");
    }
}
