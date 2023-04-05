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

    public function getAllDoctors(Request $request)
    {
        $data = $request->all();
        if (isset($data['id_medcard'])) {
            $doctors = Doctor::select('doctors.first_name',
                'doctors.last_name', 'doctors.patronymic',
                'doctors.date_of_birth', 'doctors.position',
                'specializations.specialization_name')
                ->join('specializations', 'doctors.id_doctor', '=', 'specializations.id_specialization')
                ->join('appointments', 'doctors.id_doctor', '=', 'appointments.id_ticket')
                ->where('appointments.id_medcard', $data['id_medcard'])->get();
        }
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
            $patients = Patient::select('patients.first_name',
                'patients.last_name', 'patients.patronymic',
                'patients.medcard_photo',
                'diagnoses.diagnosis_name as zxc')
                ->join('diagnoses', 'patients.id_diagnosis', '=', 'diagnoses.id_diagnosis')
                ->where('patients.id_medcard', $data['id_medcard'])
                ->get();
        }
        return (new View())->render('site.results', ['patients' => $patients]);
    }

    public function getAllPatients(Request $request)
    {
        $data = $request->all();

        if (isset($data)) {
        }
    }
}