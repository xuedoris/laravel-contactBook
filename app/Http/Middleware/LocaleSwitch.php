<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Config;
use App;

class LocaleSwitch
{
    /**
     * Set locale for every single request
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        App::setLocale($request->session()->has('locale') ? $request->session()->get('locale') : Config::get('app.locale'));
        return $next($request);
    }
}
