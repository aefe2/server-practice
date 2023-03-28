<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])->middleware('auth');
Route::add(['GET', 'POST'], '/admin', [Controller\Site::class, 'addUser', 'adminPanel'])->middleware('auth', 'admin');
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
//Route::add('GET', '/admin', [Controller\Site::class, 'adminPanel'])->middleware('auth', 'admin');
Route::add('GET', '/choices', [Controller\Site::class, 'choices'])->middleware('auth');
Route::add('GET', '/reception', [Controller\Site::class, 'reception'])->middleware('auth');
