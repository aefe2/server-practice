<?php

namespace Controller;

use Model\Post;
use Model\User;
use Model\Specializations;
use Model\Patient;
use Src\Request;
use Src\View;
use Src\Auth\Auth;

class Site
{

    public function hello(): string
    {
        return new View('site.hello', ['message' => 'Здравствуйте, ' . app()->auth::user()->name]);
    }

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/hello');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function choices(Request $request): string
    {
        return new View('site.choices');
    }

    public function reception(Request $request): string
    {
        return new View('site.reception');
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }

}
