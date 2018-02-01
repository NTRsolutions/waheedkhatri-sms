<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'receive-sms-status/',
        'receive-sms/',
	    'receive-lead-sms/'
    ];


    //modify this function
//    public function handle($request, \Closure $next)
//    {
//        //add this condition
//        foreach($this->except as $route) {
//
//            if ($request->is($route)) {
//                return $this->next($request);
//            }
//        }
//
//        return parent::handle($request, $next);
//    }



}
