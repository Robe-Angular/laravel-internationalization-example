<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LaravelDetectLanguage
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
        $locale = $this->parseLocale($request->header('ACCEPT-LANGUAGE'));
        App::setLocale($locale);
        return $next($request);
    }

    private function parseLocale($string_to_parse){
        $locale = substr($string_to_parse,0,2);
        return $locale;
    }
}
