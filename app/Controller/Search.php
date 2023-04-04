<?php

namespace Controller;

use Illuminate\Database\Capsule\Manager as DB;
use Model\Cabinet;
use Model\Diagnoses;
use Model\Doctor;
use Model\Patient;
use Model\Specializations;
use Src\Request;
use Src\View;
//use Illuminate\Http\Request;

class Search
{
    public function choices(Request $request): string
    {
        $cabinets = Cabinet::all();
        $doctors = DB::table('doctors')->join('specializations', 'id_doctor', '=', 'specializations.id_specialization')->get();
        $allDoctors = Doctor::all();
        $specializations = Specializations::all();
        $patients = Patient::all();
        $diagnoses = Diagnoses::all();
        return new View('site.choices', [
            'specializations' => $specializations,
            'patients' => $patients,
            'doctors' => $doctors,
            'cabinets' => $cabinets,
            'diagnoses' => $diagnoses,
            'allDoctors' => $allDoctors
        ]);
    }

    public function getAllDoctors(Request $request)
    {
//        $diagnoses = Diagnoses::all();
//        $patients = Patient::all();
//        $doctors = DB::table('doctors')->join('specializations', 'id_doctor', '=', 'specializations.id_specialization')->get();

        $patientId = $_GET['id_medcard'];
        $patientDiagnoses = DB::table('diagnoses')->where('id_diagnosis', '=', $patientId);
//        $request->fullUrlWithQuery(['choices' => null]);
//        return new View('site.results', ['patientDiagnoses' => $patientDiagnoses, 'diagnoses' => $diagnoses, 'patients' => $patients, 'doctors' => $doctors]);
        return (new View())->render('site.results', ['patientDiagnoses' => $patientDiagnoses]);
    }

//    public function allDoctors(Request $request)
//    {
//        $doctors = DB::table('doctors')->where('');
//    }
//
//    public function getAllPatients(Request $request)
//    {
//
//    }
}