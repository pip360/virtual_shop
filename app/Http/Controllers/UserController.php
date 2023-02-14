<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Isset_;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

class UserController extends Controller
{

	public function showAllUsers()
	{
		$users = $this->getAllUsers()->original['users'];
		return view('users.index', compact('users'));
	}

	public function showCreateUser()
	{
		$roles = $this->getAllRoles()->original['roles'];
		return view('users.create-user', compact('roles'));
	}

	public function showEditUser(User $user)
	{
		$user->load('roles');
		$roles = $this->getAllRoles()->original['roles'];
		return view('users.edit-user', compact('user', 'roles'));
	}

	//funcion para ver todos los usuarios
	public function getAllUsers()
	{
		$users = User::get();
		return response()->json(['users' => $users], 200);
	}

	public function getAllRoles()
	{
		$roles = Role::all()->pluck('name');
		return response()->json(['roles' => $roles], 200);
	}

	//funcion para ver un usuario
	public function getAnUser(User $user)
	{
		return response()->json(['user' => $user], 200);
	}

	//funcion para crear un usuario
	public function createUser(CreateUserRequest $request)
	{
		try {
		 	DB::beginTransaction();
			 $user = new User($request->all());
			 $user->save();
			 $user->assignRole($request->role);
		 	DB::commit();
			 if ($request->ajax()) return response()->json(['user' => $user], 201);
			 return back()->with('success' ,'Usuario Creado');
		} catch (\Throwable $th) {
		 	DB::rollback();
			throw $th;
		}
	}

	//funcion para editar un usuario
	public function updateUser(User $user, UpdateUserRequest $request)
	{
		try {
		DB::beginTransaction();
		$allRequest = $request->all();
		if(isset($allRequest['password'])) {
			if (!$allRequest['password']) unset($allRequest['password']);
		}

		$user->update($request->all());
		$user->syncRoles([$request->role]);
		DB::commit();

		if ($request->ajax()) return response()->json(['user' => $user->refresh()], 201);
		return back()->with('success' ,'Usuario editado');
		} catch (\Throwable $th) {
			DB::rollback();
		throw $th;
		}
	}

	//funcion para eliminar un usuario
	public function deleteUser(User $user, Request $request)
	{
		$user->delete();
		if ($request->ajax()) return response()->json(['user' => $user->refresh()], 201);
		return back()->with('error' ,'Usuario eliminado');
	}
}
