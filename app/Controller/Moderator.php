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
                'id_medcard' => ['required'],
                'id_doctor' => ['required'],
                'appointment_date' => ['required', 'appointmentDate'],
                'appointment_time' => ['required'],
                'id_cabinet' => ['required']
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
                'first_name' => ['required', 'cyrillic'],
                'last_name' => ['required', 'cyrillic'],
                'patronymic' => ['required', 'cyrillic'],
                'date_of_birth' => ['required', 'birthday'],
                'medcard_photo' => ['required', 'fileType', 'fileSize']
            ], [
                'required' => 'Поле :field пусто'
            ]);
            if ($validator->fails()) {
                return new View('site.reception',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            $fileUploader = new FileUploader($_FILES['medcard_photo']);

            $destination = 'uploads';

            $newFileName = $fileUploader->upload($destination);

            if (DB::table('patients')->insert([
                'medcard_photo' => $destination . '/' . $newFileName,
                'last_name' => $_POST['last_name'],
                'first_name' => $_POST['first_name'],
                'patronymic' => $_POST['patronymic'],
                'id_diagnosis' => $_POST['id_diagnosis'],
                'date_of_birth' => $_POST['date_of_birth'],
            ])) {
                app()->route->redirect('/reception');
            }
        }
        return (new View())->render('site.reception');
    }
}