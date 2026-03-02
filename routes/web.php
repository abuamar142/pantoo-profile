<?php

use Illuminate\Support\Facades\Route;

Route::get('/locale/{locale}', function (string $locale) {
    $supportedLocales = ['id', 'en'];

    abort_unless(in_array($locale, $supportedLocales, true), 404);

    session(['locale' => $locale]);

    return redirect()->back();
})->name('locale.switch');

Route::get('/', function () {
    return view('welcome');
});
