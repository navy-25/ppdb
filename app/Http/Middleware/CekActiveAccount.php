<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CekActiveAccount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->role == 'Root') {
            return $next($request);
        } elseif ($request->user()->role == "Admin") {
            $data = DB::table('users as d')
                ->select('d.*')
                ->where('d.id', $request->user()->id)
                ->first();
            if ($data->status == 1) {
                return $next($request);
            }
        }
        Auth::logout();
        return redirect()->route('login')->with(['error' => 'Akun anda telah dinonaktifkan']);
    }
}
