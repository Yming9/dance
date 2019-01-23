<?php

namespace App\Http\Middleware;

use Closure;

class HomeLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $member_id = session()->get('member_id');
        if(!$member_id)
        {
            return redirect('/home/page');
        }
        return $next($request);
    }
}
