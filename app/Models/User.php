<?php

namespace App\Models;


use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

   protected $table = 'users';

    protected $fillable = [
        'number_id',
		'name',
		'last_name',
        'email',
        'password',
    ];


    protected $hidden = [
        'password'
    ];

	protected $appends = ['full_name'];

	protected $cast = [
		'created_ad' => 'datetime:Y-m-d',
		'updated_ad' => 'datetime:Y-m-d',
	];

	// accesor

	public function getFullNameAttribute($value)
	{
		return "{$this->name} {$this->last_name}";
	}

	// mutator (create-update)
	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = bcrypt($value);
	}

	//relations

	public function CustomerShoppingcart()
	{
		return $this->HasMany(ShoppingCart::class, 'customer_user_product', 'id');
	}

	public function OwnerShoppingcart()
	{
		return $this->HasMany(ShoppingCart::class, 'owner_user_product', 'id');
	}
}
