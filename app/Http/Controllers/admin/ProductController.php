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
		return view('admin.products.index')->with(compact('products'));    	
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
		return view('admin.products.create')->with(compact('categories'));
    }

    public function store(Request $request)
    {	
    	//validar
    	$messages = [
    		'name.required' => 'Tu producto necesita un nombre',
    		'name.min' => 'El nombre de tu producto debe tener al menos tres carácteres',
    		'description.required' => 'Tu producto requiere una descripción breve',
    		'description.max' => 'Una descripción breve no debería superar 200 caracteres',
    		'price.required' => 'Tus clientes necesitan conocer el precio del producto',
    		'price.numeric' => 'Expresa el precio en números',
    		'price.min' => 'Los precios no deben ser expresados en cifras negativas'
    	];

    	$rules = [
    		'name' => 'required|min:3',
    		'description' => 'required|max:200',
    		'price' => 'required|numeric|min:0'

    	];
    	$this->validate($request, $rules, $messages);

    	// dd($request->all());
    	$product = new Product();
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;
    	$product->save();

    	return redirect('/admin/products');
    }

    public function edit($id)
    {
    	// return "Mostrar aquí el formulario de edición para el producto con id $id";
    	$product = Product::find($id);
		return view('admin.products.edit')->with(compact('product'));
    }

    public function update(Request $request, $id)
    {
    	//validar
    	$messages = [
    		'name.required' => 'Tu producto necesita un nombre',
    		'name.min' => 'El nombre de tu producto debe tener al menos tres carácteres',
    		'description.required' => 'Tu producto requiere una descripción breve',
    		'description.max' => 'Una descripción breve no debería superar 200 caracteres',
    		'price.required' => 'Tus clientes necesitan conocer el precio del producto',
    		'price.numeric' => 'Expresa el precio en números',
    		'price.min' => 'Los precios no deben ser expresados en cifras negativas'
    	];

    	$rules = [
    		'name' => 'required|min:3',
    		'description' => 'required|max:200',
    		'price' => 'required|numeric|min:0'

    	];
    	$this->validate($request, $rules, $messages);


    	// dd($request->all());
    	$product = Product::find($id);
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->long_description = $request->input('long_description');
    	$product->save();

    	return redirect('/admin/products');
    }

    public function destroy($id)
    {
    	$product = Product::find($id);
    	$product->delete();

    	return back();
    }
}
