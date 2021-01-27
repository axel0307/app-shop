<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;
use File;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::orderBy('name')->paginate(5);
    	return view('admin.categories.index')->with(compact('categories')); // listado
    }

    public function create()
    {
    	return view('admin.categories.create'); // ver formulario de registro
    }

    public function store(Request $request)
    {
        $this->validate($request, Category::$rules, Category::$messages);

    	// Registrar categoría en la Base de Datos
    	$category = Category::create($request->only('name', 'description')); // mass assignment

        if($request->hasFile('image')){
            // Guardar la imagen en el proyecto
            $file = $request->file('image');
            $path = public_path() . '/images/categories';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);

            // UPDATE de la categoria
            if($moved){
                $category->image = $fileName;
                $category->save(); // UPDATE
            }
        }
    	return redirect('/admin/categories'); 
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with(compact('category')); // ver formulario de registro
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, Category::$rules, Category::$messages);
        
        // Actualizar categoría en la Base de Datos
        //dd($request->all());
        $category->update($request->only('name', 'description'));

        if($request->hasFile('image')){
            // Guardar la imagen en el proyecto
            $file = $request->file('image');
            $path = public_path() . '/images/categories';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);

            // UPDATE de la categoria
            if($moved){
                $previousPath = $path . '/' . $category->image;

                $category->image = $fileName;
                $saved = $category->save(); // UPDATE

                if($saved)
                    File::delete($previousPath);
            }
        }
        return redirect('/admin/categories');
    }

    public function destroy(Category $category)
    {
        //dd($request->all());
        $category->delete(); // Eliminar el producto (Delete)

        return back();
    }
}
