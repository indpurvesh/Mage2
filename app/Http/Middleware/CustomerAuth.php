<?php

namespace App\Http\Middleware;

use Closure;
use App\Auth\Guard;

class CustomerAuth
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $frontAuth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->frontAuth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->frontAuth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('/login');
            }
        }

        return $next($request);
    }
}
