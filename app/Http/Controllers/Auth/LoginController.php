<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display login page.
     *
     * @return Renderable
     */
    public function show() {
        $pageTitle = "Sign in || ". env('APP_NAME');

        return view('user.auth.login', compact('pageTitle'));
    }

    /**
     * Handle account login request
     *
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {

        $credentials = $request->getCredentials();

        if(!Auth::guard('web')->validate($credentials)):
            return redirect()->to('auth/login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    /**
     * Handle response after user authenticated
     *
     * @param Request $request
     * @param Auth $user
     *
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        $request->session()->regenerate();

        $user = User::findOrFail(Auth::user()->id);
        $user->session_id = session()->getId();
        $user->save();

        return redirect()->route('user.dashboard');
    }

    /**
     * Display admin login page.
     *
     * @return Renderable
     */
    public function adminShow() {
        $pageTitle = "Staff sign in || ". env('APP_NAME');

        return view('admin.auth.login', compact('pageTitle'));
    }

    /**
     * Handle admin account login request
     *
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function adminLogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard.show'); // Adjust the route accordingly
        }

        return back()->withErrors(trans('auth.failed'));
    }
}
