<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::group(['prefix' => 'Users', 'controller' => UserController::class], function (){
	Route::get('GetAllUsers', 'getAllUsers'); //GET - trae data
	Route::get('GetAnUser/{user}', 'getAnUser'); //GET - trae data
	Route::post('CreateUser', 'createUser'); //POST - crea data
	Route::put('UpdateUser/{user}', 'updateUser'); //PUT - editar data
	Route::delete('DeleteUser/{user}', 'deleteUser'); //DELETE - trae data
});

// products
Route::group(['prefix' => 'Products','controller' => ProductController::class], function() {
	Route::get('/GetAllProducts', 'getAllProducts');
	Route::post('/SaveProduct', 'saveProduct');
});

// categories
Route::group(['prefix' => 'Categories', 'controller' => CategoryController::class], function () {
	Route::get('/GetAllCategories', 'getAllCategories');
});
