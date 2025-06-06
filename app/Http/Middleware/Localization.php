<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Localization
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle(Request $request, Closure $next)
  {
    // List of supported locales
    $supportedLocales = ['en', 'ar'];

    if (Session::has('locale')) {
      $locale = Session::get('locale');
    } else {
      // Get first 2 letters of Accept-Language header
      $locale = substr($request->header('Accept-Language', 'en'), 0, 2);
    }

    // Only set if the locale is supported
    if (in_array($locale, $supportedLocales)) {
      App::setLocale($locale);
    } else {
      App::setLocale('en'); // fallback
    }

    return $next($request);
  }
}