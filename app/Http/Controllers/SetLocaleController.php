<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

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
