<?php

namespace Controller;

use Model\Doctor;
use Model\Patient;
use Model\User;
use Model\Specializations;
use Src\Request;
use Src\View;
use Src\Validator\Validator;

class Moderator
{
    public function addPatient(Request $request): string
    {
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'first_name' => ['required'],
                'last_name' => ['required'],
                'patronymic' => ['required'],
                'date_of_birth' => ['required']
            ], [
                'required' => 'Поле :field пусто'
            ]);
            if ($validator->fails()) {
                return new View('site.reception',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
            if (Patient::create($request->all())) {
                app()->route->redirect('/reception');
            }
        }
        return (new View())->render('site.reception');
    }
}