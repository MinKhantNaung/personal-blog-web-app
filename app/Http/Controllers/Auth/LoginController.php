<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function showLoginForm()
    {
        $previousURL = url()->previous();
        $baseURL = url()->to('/');

        if ($previousURL != $baseURL . '/login') {
            session()->put('url.intended' . $previousURL);
        }
        return view('auth.login');
    }
    // custom redirect // default name authenticated
    protected function authenticated(Request $request, $user)
    {
        if (Auth::user()->status == 'admin') {
            return redirect('/admin/dashboard');
        } else {
            $this->showLoginForm();
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
