<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleGeneratorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/write', function () {
    $title = '';
    $content = '';
    return view('write', compact('title', 'content'));
});

Route::post('/write/generate', [ArticleGeneratorController::class, 'index']);
