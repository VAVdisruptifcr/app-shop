<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	//validar
	public static $messages = [
		'name.required' => 'Tu producto necesita un nombre',
		'name.min' => 'El nombre de tu producto debe tener al menos tres carácteres',
		'description.max' => 'Una descripción breve no debería superar 300 caracteres'
	];

	public static $rules = [
		'name' => 'required|min:3',
		'description' => 'max:300'

	];
	protected $fillable = ['name', 'description'];

    //$category->products
    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}
