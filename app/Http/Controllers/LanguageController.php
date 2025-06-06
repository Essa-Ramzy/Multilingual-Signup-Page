<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
  /**
   * Change the application language.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  string  $locale
   * @return \Illuminate\Http\Response
   */
  public function switchLang($locale)
  {
    // Check if the language is supported
    if (in_array($locale, ['en', 'ar'])) {
      Session::put('locale', $locale);
    }

    return redirect()->back();
  }
}