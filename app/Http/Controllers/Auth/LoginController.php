<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(){
        return view('admin.login.index');
    }

    public function checkLogin(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
          ]);
          // Attempt to log the user in
          if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('admin.home.index'));
            }
            // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('admin.login.index');

    }



}
