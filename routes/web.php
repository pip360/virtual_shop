<?php

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ConfirmPasswordController;

//Categories
Route::group(['prefix' => 'Categories', 'middleware' => ['auth','role:admin'],'controller' => CategoryController::class], function()
{
		Route::get('/', 'showCategories')->name('categories');

		Route::get('/GetAllCategories', 'getAllCategories');

		Route::get('/GetACategory/{category}', 'getACategory');

		Route::post('/SaveCategory', 'saveCategory');

		Route::post('/UpdateCategory/{category}', 'updateCategory');

		Route::delete('/DeleteACategory/{category}', 'deleteCategory');

		Route::get('/GetAllCategoriesDataTable', 'getAllCategoriesForDataTable');

});

Route::get('/', [CategoryController::class, 'showHomeWithCategories']);


Route::group(['prefix' => 'CategoriesView', 'controller' => CategoryController::class], function () {
	Route::get('/', 'categoriesView')->name('categoriesview.index');

	Route::get('/GetAllCategoriesWithProducts', 'getAllCategoriesWithProducts');

	Route::get('/GetACategoryWithProduct/{category}', 'getACategoryWithProduct')->name('categoriesview.index');
});

Route::get('/test', function(){
	/* $users = User::get();
	foreach ($users as $user) {
		if($user->number_id == 1000862550) $user->assignRole('admin');
		else $user->assignRole('user');
	} */
	/* Role::create(['name' => 'user']); */
	/* return Role::all()->pluck('name'); */
});

/* Route::view('/','home'); */

/* Route::get('/', [ProductController::class, 'showHomeWithProducts'])->name('home');
 */

// users
Route::group(['prefix' => 'Users',
'controller' => UserController::class], function() {
	Route::post('/CreateUser', 'createUser')->name('user.create.post');
});

Route::group(['prefix' => 'Users', 'middleware' => ['auth', 'role:admin'],
'controller' => UserController::class], function() {
	Route::get('/', 'showAllUsers')->name('users');
	Route::get('/CreateUser', 'showCreateUser')->name('user.create');
	Route::get('/EditUser/{user}', 'showEditUser')->name('user.edit');
	Route::put('/EditUser{user}', 'updateUser')->name('user.edit.put');
	Route::delete('/DeleteUser{user}', 'deleteUser')->name('user.delete');
});


// products
Route::group(['prefix' => 'Products', 'middleware' => ['auth','role:admin'], 'controller' => ProductController::class],
		function() {
		Route::get('/', 'showProducts')->name('products');
		Route::get('/GetAllProducts', 'getAllProducts');
		Route::get('/GetAllProductsDataTable', 'getAllProductsForDataTable');
		Route::get('/GetAProduct/{product}', 'getAProduct');
		Route::post('/SaveProduct', 'saveProduct');
		Route::post('/UpdateProduct/{product}', 'updateProduct');
		Route::delete('/DeleteAProduct/{product}', 'deleteProduct');

});

// categories
Route::group(['prefix' => 'Categories', 'controller' => CategoryController::class], function () {
	Route::get('/GetAllCategories', 'getAllCategories');
});

//auth-------------------------------------------------------------------------------------

Route::group(['controller' => LoginController::class], function() {
// Login Routes...
	Route::get('login','showLoginForm')->name('login');
	Route::post('login', 'login');
// Logout Routes...
	Route::post('logout', 'logout')->name('logout');
});

Route::group(['controller' => RegisterController::class], function() {
	//register routes
	Route::get('register', 'showRegistrationForm')->name('register');
	Route::post('register', 'register');
	});

Route::group(['controller' => ForgotPasswordController::class], function() {
// Password forgot Routes...
	Route::get('password/reset', 'showLinkRequestForm')
	->name('password.request');
	Route::post('password/email', 'sendResetLinkEmail')
	->name('password.email');
});

Route::group(['controller' => ResetPasswordController::class], function() {
	// Password Reset Routes...
	Route::get('password/reset/{token}', 'showResetForm')
	->name('password.reset');
	Route::post('password/reset', 'reset')
	->name('password.update');
});

Route::group(['controller' => ConfirmPasswordController::class], function() {
	// Password Confirmation Routes...
	Route::get('password/confirm', 'showConfirmForm')
		->name('password.confirm');
	Route::post('password/confirm', 'confirm');
});

Route::group(['controller' => VerificationController::class], function() {
	// Email Verification Routes...
	Route::get('email/verify', 'show')
		->name('verification.notice');
	Route::get('email/verify/{id}/{hash}', 'verify')
		->name('verification.verify');
	Route::post('email/resend', 'resend')
		->name('verification.resend');
});

Route::get('/getProductDetail/{product}', [ProductController::class, 'getProductDetail'])->name('getproductdetail');

//cart
Route::post('/additem', [App\Http\Controllers\CartController::class, 'addItem'])->name("additem");
Route::get('/showcart', [App\Http\Controllers\CartController::class, 'showCart'])->name("showcart");
Route::get('/incrementar/{id}', [App\Http\Controllers\CartController::class, 'incrementarCantidad'])->name("incrementarcantidad");
Route::get('/decrementar/{id}', [App\Http\Controllers\CartController::class, 'decrementarCantidad'])->name("decrementarcantidad");
Route::get('/eliminaritem/{id}', [App\Http\Controllers\CartController::class, 'eliminarItem'])->name("eliminaritem");
Route::get('/eliminarcarrito', [App\Http\Controllers\CartController::class, 'eliminarCarrito'])->name("eliminarcarrito");



