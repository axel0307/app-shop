<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::paginate(10);
    	return view('admin.products.index')->with(compact('products')); // listado
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
    	return view('admin.products.create')->with(compact('categories')); // ver formulario de registro
    }

    public function store(Request $request)
    {
        // Validar
        $messages =[
            'name.required' => 'Es necesario ingresar un nombre para el producto.',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres.',
            'description.required' => 'La descripción es un campo obligatorio',
            'description.max' => 'La descripción del producto solo puede tener como máximo 50 caracteres',
            'price.required' => 'Es obligatorio definir un precio para el precio',
            'price.numeric' => 'Ingrese un precio válido',
            'price.min' => 'Como mínimo debe tener el precio de $1 peso, NO regales el producto'
        ];

        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:50',
            'price' => 'required|numeric|min:1'
        ];
        $this->validate($request, $rules, $messages);

    	// Registrar producto en la Base de Datos
    	//dd($request->all());
    	$product = new Product();
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;
    	$product->save(); // Guarda el producto (INSERT)

    	return redirect('/admin/products');
    }

    public function edit($id)
    {
        $categories = Category::orderBy('name')->get();
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product', 'categories')); // ver formulario de registro
    }

    public function update(Request $request, $id)
    {
        // Validar
        $messages =[
            'name.required' => 'Es necesario ingresar un nombre para el producto.',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres.',
            'description.required' => 'La descripción es un campo obligatorio',
            'description.max' => 'La descripción del producto solo puede tener como máximo 50 caracteres',
            'price.required' => 'Es obligatorio definir un precio para el precio',
            'price.numeric' => 'Ingrese un precio válido',
            'price.min' => 'Como mínimo debe tener el precio de $1 peso, NO regales el producto'
        ];

        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:50',
            'price' => 'required|numeric|min:1'
        ];
        $this->validate($request, $rules, $messages);
        
        // Registrar producto en la Base de Datos
        //dd($request->all());
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;
        $product->save(); // Actualizar el producto (Update)

        return redirect('/admin/products');
    }

    public function destroy($id)
    {
        // Registrar producto en la Base de Datos
        //dd($request->all());
        $product = Product::find($id);
        $product->delete(); // Eliminar el producto (Delete)

        return back();
    }
}
