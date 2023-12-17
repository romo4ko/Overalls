<?php
 
namespace App\Http\Responses;
 
use Filament\Http\Responses\Auth\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\Auth;

class LoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
		$role = Auth::user()->role;

		if ($role === 'moderator') {
			$url = 'moderator';
		}
		else if ($role === 'guest'){
			$url = 'guest';
		}
		else {
			$url = $role;
		}
 
        return redirect()->intended($url);
    }
}