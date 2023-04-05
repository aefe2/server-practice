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
        $patientId = $_GET['id_medcard'];
        $doctors = DB::table('appointments')->where($patientId, '=', "id_doctor./$patientId/")->get();
        return (new View())->render('site.results', ['doctors' => $doctors]);
    }

    public function allDiagnoses(Request $request)
    {
        $diagnoses = Diagnoses::all();
        return (new View())->render('site.results', ['diagnoses' => $diagnoses]);
    }

    public function patientDiagnoses(Request $request)
    {
        $patients = Patient::all();
        $diagnoses = Diagnoses::all();
        $data = $request->all();

        if (isset($data['id_medcard'])) {
//            $diagnoses = DB::table('patients')
//                ->join('diagnoses', 'patients.id_diagnosis', '=', 'diagnoses.id_diagnosis')
//                ->select('patients.*', 'diagnoses.diagnosis_name as name')
//                ->where('diagnoses.id_diagnosis', 'patients.id_diagnosis')->get();
            $patients = Patient::select('patients.first_name', 'diagnoses.diagnosis_name as zxc')
                ->join('diagnoses', 'patients.id_diagnosis', '=', 'diagnoses.id_diagnosis')
                ->where('patients.id_medcard', $data['id_medcard'])
                ->get();
        }
        return (new View())->render('site.results', ['patients' => $patients]);
    }
}