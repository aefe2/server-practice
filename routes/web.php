<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add('GET', '/admin', [Controller\Site::class, 'adminPanel'])->middleware('auth');
Route::add('GET', '/choices', [Controller\Site::class, 'choices']);
Route::add('GET', '/reception', [Controller\Site::class, 'reception']);
