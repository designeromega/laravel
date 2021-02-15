<?php
/**
 * 
 */
namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserResquest;
class UserController extends Controller
{
	/**
	 * Returm a list of all users
   * @return type
   */
	public function index(){
		$users = User::latest()->get();
		return view('Users.index', [
			'users' => $users
		]);
	}

	/**
	 * Receive a Request objet with the data from the form and sotre in the User DB
   * @param UserResquest $request
   * @return type
   */
	public function store(UserResquest $request){
		User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => bcrypt($request->password),
		]);
		return back();
	}

	/**
	 * Receive a User objetc and delete it from the DB
   * @param User $user
   * @return type
   */
	public function destroy(User $user){
		$user->delete();
		return back();
	}
}
