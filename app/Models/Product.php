<?php

namespace App\Models;
use App\Models\Category;
use App\Models\Shoppingcart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

	protected $fillable = [
		'category_id',
		'name',
		'image',
		'description',
		'stock',
		'price'
    ];

	public function Category()
	{
		return $this->belongsTo(Category::class, 'category_id', 'id');
	}

	public function Shopingcarts()
	{
		return $this->HasMany(Shopingcart::class, 'product_id', 'id');
	}
}
