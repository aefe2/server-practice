<?php

namespace Controller;

use Model\User;
use Model\Specializations;
use Src\Request;
use Src\View;
use Src\Validator\Validator;

class Admin
{

    public function adminPanel(Request $request): string
    {
        $specializations = Specializations::all();
        return (new View())->render('site.admin', ['specializations' => $specializations]);
    }

    public function addUser(Request $request): string
    {
        {
            if ($request->method === 'POST') {

                $validator = new Validator($request->all(), [
                    'name' => ['required'],
                    'last_name' => ['required'],
                    'patronymic' => ['required'],
                    'login' => ['required', 'unique:users,login'],
                    'password' => ['required']
                ], [
                    'required' => 'Поле :field пусто',
                    'unique' => 'Поле :field должно быть уникально'
                ]);

                if ($validator->fails()) {
                    return new View('site.admin',
                        ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
                }

                if (User::create($request->all())) {
                    return $this->adminPanel($request);
                }
            }
            return $this->adminPanel($request);
        }

    }
}