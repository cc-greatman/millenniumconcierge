<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = Auth::guard('web')->id();
        $user = User::findOrFail($id);

        if (!$user->memberships || $user->memberships->type === 0 || in_array($user->memberships->status, ['inactive', 'canceled'])) {

            return redirect()->route('membership.plans.view');
        }
        return $next($request);
    }
}
