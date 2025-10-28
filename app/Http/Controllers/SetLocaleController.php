<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SetLocaleController extends Controller
{
    public function index(string $locale): RedirectResponse
    {


        if (! in_array($locale, config('app.locales', ['en', 'fr']), true)) {
            abort(400);
        }
        session()->put('locale', $locale);
        return back();
    }
}
