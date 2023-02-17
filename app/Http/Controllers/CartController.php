<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
	public function additem(Request $request){
		$product = Product::find($request->producto_id);

		Cart::add([
			'id' => $product->id,
			'name' => $product->name,
			'price' => $product->price,
			'qty' => 1,
			'weight' =>1,
			'options' => [
				'image' => $product->image,
				'name' => null,
			]
			]);
			return redirect()->back()->with("success","$product->name !Se ha agregado correctamente al carrito");
	}
	public function showCart(){
		return view('Cart.cart');
	}
}
