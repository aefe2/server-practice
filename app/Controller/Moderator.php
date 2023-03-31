<?php

namespace Controller;

use Illuminate\Database\Capsule\Manager as DB;
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

class Moderator
{
    public function moderatorPanel(Request $request): string
    {
        $cabinets = Cabinet::all();
        $doctors = DB::table('doctors')->join('specializations', 'id_doctor', '=', 'specializations.id_specialization')->get();
        $specializations = Specializations::all();
        $full_names = Patient::all();
        $diagnoses = Diagnoses::all();
        return (new View())->render('site.reception', [
            'specializations' => $specializations,
            'full_names' => $full_names,
            'doctors' => $doctors,
            'cabinets' => $cabinets,
            'diagnoses' => $diagnoses
        ]);
    }

    public function recordPatient(Request $request): string
    {
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'appointment_date' => ['required'],
                'appointment_time' => ['required']
            ], [
                'required' => 'Поле :field пусто'
            ]);
            if ($validator->fails()) {
                return new View('site.reception',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
            if (Appointment::create($request->all())) {
                app()->route->redirect('/reception');
            }
        }
        return (new View())->render('site.reception');
    }

    public function registerPatient(Request $request): string
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

            $fileUploader = new FileUploader($_FILES['medcard_photo']);
            //xampp
            $destination = 'uploads/';
//            $destination = '/server-practice/public/uploads/';
            $allowedTypes = ['image/jpeg', 'image.png'];
            //Макс размер в битах, 2.5Мб в данный момент
            $maxSize = 20971520;

            $newFileName = $fileUploader->upload($destination, $allowedTypes, $maxSize);
            if (Patient::create($request->all())) {
                return (new View())->render('site.reception');
            }
        }
        return (new View())->render('site.reception');
    }
}