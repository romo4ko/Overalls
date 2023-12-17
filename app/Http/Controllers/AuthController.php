<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	public function logout()
	{
		Auth::logout();
		return view('layout.main');
	}

	public function getlogin() 
	{
		return view('layout.login');
	}

	public function postlogin(Request $request) {
		
		$request->validate([
			'email'   => 'required|email',
			'password'  => 'required|alphaNum|min:3'
		]);
	  
		$user_data = array(
			'email'  => $request->get('email'),
			'password' => $request->get('password')
		);
	
		if(Auth::attempt($user_data)) {

			$role = Auth::user()->role;

			switch ($role) {
				case 'moderator':
					return view('layout.moderator');
				case 'guest':
					return view('layout.guest');
				case 'admin':
					return redirect('/admin');
				default:
					return redirect('/main');
			}
		}
		else {
			return back()->with('error', 'Wrong Login Details');
		}
	}
}
