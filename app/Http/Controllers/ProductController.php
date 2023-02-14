<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
	public function showProducts()
	{
		return view('products.index');
	}

    function showHomeWithProducts() {
		$products = $this->getAllProducts()->original['products'];

		return view('index', compact('products'));
	}

	public function getAllProducts()
	{
		$products = Product::get();
		return response()->json(['products' => $products], 200);
	}

	public function getAllProductsForDataTable()
	{
		$products = Product::with('category');
		return DataTables::of($products)
		->addColumn('action',  function ($row){
			return "<a
			href='#'
			onclick='event.preventDefault();'
			data-id='{$row->id}'
			role='edit'
			class='btn btn-warning btn-sm'>Edit</a>
			<a
			href='#'
			onclick='event.preventDefault();'
			data-id='{$row->id}'
			role='delete'
			class='btn btn-danger btn-sm'>Delete</a>";
		})
		->rawColumns(['action'])
		->make();
	}

	public function getAProduct(Product $product)
	{
		$product->load('Category');
		return response()->json(['product' => $product], 200);
	}

	public function saveProduct(Request $request)
	{
		$product = new Product($request->all());
		$this->uploadImages($request, $product);
		$product->save();
		return response()->json(['product' => $product->load('Category')], 201);
	}

	public function updateProduct(Product $product, Request $request)
	{
		$requestAll = $request->all();
		$this->uploadImages($request, $product);
		$requestAll['image'] = $product->image;
		$product->update($requestAll);
		return response()->json(['product' => $product->refresh()->load('Category')], 201);
	}

	public function deleteProduct(Product $product)
	{
		$product->delete();
		return response()->json([], 204);
	}

	private function uploadImages($request, &$product)
	{
		if (!isset($request->image)) return;
		$random = Str::random(20);
		$image_name = "{$random}.{$request->image->clientExtension()}";
		$request->image->move(storage_path('app/public/images'), $image_name);
		$product->image = $image_name;
	}

	public function getProductDetail(Product $product)
    {
        // $product->load('Category');
        // $product = Product::get();
        return view('productdetail.ProductDetail', compact('product'));
    }

}
