<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;

class AdminMiddleware
{
    public function handle(Request $request)
    {
        if (Auth::check() && !Auth::user()->isAdmin()) {
            app()->route->redirect('/hello');
        }
    }
}
