<?php
/**
 * 
 */
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
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
   * @param Request $request
   * @return type
   */
	public function store(Request $request){
		/**
		 * Validate required fields and also email format and min length
		 */
		$request->validate([
			'name' => ['required'],
			'email' => ['required', 'email', 'min:8', 'unique:users'],
			'password' => ['required', 'min:8'],
		]);
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
