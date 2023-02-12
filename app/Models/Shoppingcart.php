<?php

namespace App\Models;
use App\Models\Product;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shoppingcart extends Model
{
    use HasFactory, SoftDeletes;

	protected $fillable = [
		'customer_user_id',
		'owner_user_id',
		'product_id',
    ];

	public function Product()
	{
		return $this->belongsTo(Product::class, 'product', 'id');
	}

	public function Owner()
	{
		return $this->belongsTo(User::class, 'owner_user_product', 'id');
	}

	public function Customer()
	{
		return $this->belongsTo(User::class, 'customer_user_product', 'id');
	}

}
