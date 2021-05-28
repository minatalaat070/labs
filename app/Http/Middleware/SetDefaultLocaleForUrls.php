<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SetDefaultLocaleForUrls {

	/**
	 * Handle an incoming request.
	 *
	 * @param  Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next) {
		if (session()->has('locale')) {
			app()->setLocale(session('locale'));
		} else {
			//dd(config('app.fallback_locale'));
			app()->setLocale(config('app.fallback_locale'));
		}
		return $next($request);
	}

}
