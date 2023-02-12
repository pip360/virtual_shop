<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use PhpParser\Node\Expr\Isset_;

class UserController extends Controller
{

	public function showAllUsers()
	{
		$users = $this->getAllUsers()->original['users'];
		return view('users.index', compact('users'));
	}

	public function showCreateUser()
	{
		return view('users.create-user');
	}

	public function showEditUser(User $user)
	{
		return view('users.edit-user', compact('user'));
	}

	//funcion para ver todos los usuarios
	public function getAllUsers()
	{
		$users = User::get();
		return response()->json(['users' => $users], 200);
	}

	//funcion para ver un usuario
	public function getAnUser(User $user)
	{
		return response()->json(['user' => $user], 200);
	}

	//funcion para crear un usuario
	public function createUser(CreateUserRequest $request)
	{
		$user = new User($request->all());
		$user->save();
		if ($request->ajax()) return response()->json(['user' => $user], 201);
		return back()->with('success' ,'Usuario Creado');
	}

	//funcion para editar un usuario
	public function updateUser(User $user, UpdateUserRequest $request)
	{
		$allRequest = $request->all();
		if(isset($allRequest['password'])) {
			if (!$allRequest['password']) unset($allRequest['password']);
		}

		$user->update($request->all());

		if ($request->ajax()) return response()->json(['user' => $user->refresh()], 201);
		return back()->with('success' ,'Usuario editado');
	}

	//funcion para eliminar un usuario
	public function deleteUser(User $user, Request $request)
	{
		$user->delete();
		if ($request->ajax()) return response()->json(['user' => $user->refresh()], 201);
		return back()->with('error' ,'Usuario eliminado');
	}
}
