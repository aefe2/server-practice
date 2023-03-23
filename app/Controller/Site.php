<?php

namespace Controller;

use Illuminate\Database\Capsule\Manager as DB;
use Src\View;

class Site
{
    public function index(): string
    {
        $posts = DB::table('posts')->get();
        return (new View())->render('site.post', ['posts' => $posts]);
    }

    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }
}
