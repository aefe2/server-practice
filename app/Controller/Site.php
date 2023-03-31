<?php

namespace Controller;

use Illuminate\Database\Capsule\Manager as DB;
use Model\Cabinet;
use Model\Diagnoses;
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
        $cabinets = Cabinet::all();
        $doctors = DB::table('doctors')->join('specializations', 'id_doctor', '=', 'specializations.id_specialization')->get();
        $specializations = Specializations::all();
        $patients = Patient::all();
        $diagnoses = Diagnoses::all();
        return new View('site.choices', [
            'specializations' => $specializations,
            'patients' => $patients,
            'doctors' => $doctors,
            'cabinets' => $cabinets,
            'diagnoses' => $diagnoses
        ]);
    }

    public function patientDiagnoses(Request $request)
    {
        $patientId = $_POST['id_medcard'];
        $patientDiagnoses = DB::table('diagnoses')->where('id_diagnosis', '=', 2);
        return new View('site.choices', ['patientDiagnoses' => $patientDiagnoses]);
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
