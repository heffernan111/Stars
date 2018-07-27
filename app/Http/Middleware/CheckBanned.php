<?php
 
namespace App\Http\Middleware;
 
use Closure;
 
class CheckBanned
{
    public function handle($request, Closure $next)
    {
        if (\Auth::check() === true) {
            // check if user is banned
            // if user banned
            if (\Auth::user()->banned == 1) {
                abort(403, 'This action is unauthorized.');    
            } else {
                return $next($request);
            }
            
        } else {
            return $next($request);
        }
    }
}
