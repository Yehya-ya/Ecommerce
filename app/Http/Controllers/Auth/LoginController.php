<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     */
    protected string $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // override function in AuthenticatesUsers
    protected function attemptLogin(Request $request)
    {
        $fieldType = filter_var($request->input($this->username()), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        return $this->guard()->attempt(
            [$fieldType => $request->input('username'), 'password' => $request->input('password')],
            $request->filled('remember')
        );
    }

    public function username()
    {
        return 'username';
    }
}
