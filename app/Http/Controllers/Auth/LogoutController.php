<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Log out account user.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function perform()
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->session_id = null;
        $user->save();

        Auth::guard('web')->logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('auth.login.show');
    }

    /**
     * Log out account user.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function adminPerform()
    {

        Auth::guard('admin')->logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('admin.auth.login.show');
    }
}
