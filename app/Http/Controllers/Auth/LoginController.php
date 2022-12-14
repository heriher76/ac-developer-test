<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Tenant;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/en/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        $tenant = Tenant::find($user->subdomain);

        $redirect_url = 'http://'.$user->subdomain.'.'.env('CENTRAL_DOMAIN', 'localhost').'/en/home';

        $impersonate = tenancy()->impersonate($tenant, $user->id, $redirect_url);

        $path = 'http://'.$user->subdomain.'.'.env('CENTRAL_DOMAIN', 'localhost').'/en/impersonate/'.$impersonate->token;

        auth()->logout();

        return redirect($path);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect('//'.env('CENTRAL_DOMAIN', 'localhost').'/'.request()->route()->parameter('locale'));
    }
}
