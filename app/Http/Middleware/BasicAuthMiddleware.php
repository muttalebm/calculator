<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class BasicAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        try {


            if (config('basicauth.users')->contains([$request->getUser(), $request->getPassword()])) {
                return $next($request);
            }
            return response(['error' => ['code' => '401', 'message' => 'forbidden']], 401, ['WWW-Authenticate' => "Basic"]);
        } catch (Exception $exception) {
            dd($exception);
        }
    }
}
