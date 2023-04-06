<?php

namespace Controller;

use Model\Appointment;
use Model\Cabinet;
use Model\Diagnoses;
use Model\Doctor;
use Model\Patient;
use Model\User;
use Model\Specializations;
use Src\FileUploader;
use Src\Request;
use Src\View;
use Src\Validator\Validator;
use Illuminate\Database\Capsule\Manager as DB;

class Admin
{

    public function adminPanel(Request $request): string
    {
        $cabinets = Cabinet::all();
        $doctors = DB::table('doctors')->join('specializations', 'doctors.id_specialization', '=', 'specializations.id_specialization')->get();
        $specializations = DB::table('specializations')->get();
        $full_names = Patient::all();
        $diagnoses = Diagnoses::all();
        return (new View())->render('site.admin', [
            'specializations' => $specializations,
            'full_names' => $full_names,
            'doctors' => $doctors,
            'cabinets' => $cabinets,
            'diagnoses' => $diagnoses
        ]);
    }

    public function patientAppointment(Request $request): string
    {
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'appointment_date' => ['required'],
                'appointment_time' => ['required']
            ], [
                'required' => 'Поле :field пусто'
            ]);
            if ($validator->fails()) {
                return new View('site.admin',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
            if (Appointment::create($request->all())) {
                app()->route->redirect('/admin');
            }
        }
        return (new View())->render('site.admin');
    }

    public function addDoctor(Request $request): string
    {
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'last_name' => ['required'],
                'first_name' => ['required'],
                'patronymic' => ['required'],
                'date_of_birth' => ['required'],
                'position' => ['required']
            ], [
                'required' => 'Поле :field пусто'
            ]);
            if ($validator->fails()) {
                return new View('site.admin',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
            if (Doctor::create($request->all())) {
                app()->route->redirect('/admin');
            }

        }
        return (new View())->render('site.admin');
    }

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
                return new View('site.admin',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            $fileUploader = new FileUploader($_FILES['medcard_photo']);

            $destination = 'uploads';
//            $destination = '/server-practice/public/uploads';
            $allowedTypes = ['image/jpeg', 'image.png', 'image/jpg'];
            //Макс размер в битах, 2.5Мб в данный момент
            $maxSize = 20971520;

            $newFileName = $fileUploader->upload($destination, $allowedTypes, $maxSize);

            if (DB::table('patients')->insert([
                'medcard_photo' => $destination . '/' . $newFileName,
                'last_name' => $_POST['last_name'],
                'first_name' => $_POST['first_name'],
                'patronymic' => $_POST['patronymic'],
                'id_diagnosis' => $_POST['id_diagnosis'],
                'date_of_birth' => $_POST['date_of_birth'],
            ])) {
                app()->route->redirect('/admin');
            }
        }
        return (new View())->render('site.admin');
    }

    public function addUser(Request $request): string
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
                app()->route->redirect('/admin');
            }
        }
        return $this->adminPanel($request);

    }
}