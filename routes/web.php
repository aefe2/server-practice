<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])->middleware('auth');
Route::group('/admin', function () {
    Route::add('GET', '/admin', [Controller\Admin::class, 'adminPanel'])->middleware('admin');
    Route::add('POST', '/add-user', [Controller\Admin::class, 'addUser'])->middleware('admin');
    Route::add('POST', '/add-doctor', [Controller\Admin::class, 'addDoctor'])->middleware('admin');
});
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add('GET', '/choices', [Controller\Site::class, 'choices'])->middleware('auth');
Route::add('GET', '/reception', [Controller\Site::class, 'reception'])->middleware('auth');
