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

    public function patientDiagnoses(Request $request)
    {
        $patientId = $_GET['id_medcard'];
        $patientDiagnoses = DB::table('diagnoses')->where('id_diagnosis', '=', $patientId);
        return new View('site.choices', ['patientDiagnoses' => $patientDiagnoses]);
    }

    public function allDoctors(Request $request)
    {
        $doctors = DB::table('doctors')->where('');
    }

    public function getAllPatients(Request $request)
    {

    }
}