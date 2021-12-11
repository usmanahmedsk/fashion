<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    protected $logoutRedirectTo = 'admin/login';

    protected $guard = 'admins';


    public function LoginView()
    {
        return view('auth.Admin.login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return IlluminateContractsAuthStatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('AdminAuthenticate');
    }

    /**
     * Log the user out of the application.
     *
     * @param IlluminateHttpRequest $request
     * @return IlluminateHttpResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('AdminAuthenticate')->logout();
        return redirect($this->logoutRedirectTo);
    }
}
