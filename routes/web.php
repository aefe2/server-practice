<?php

use Src\Route;

// Main page
Route::add('GET', '/hello', [Controller\Site::class, 'hello'])->middleware('auth');
// Admin group
Route::group('/admin', function () {
    Route::add('GET', '/admin', [Controller\Admin::class, 'adminPanel'])->middleware('admin');
    Route::add('POST', '/add-user', [Controller\Admin::class, 'addUser'])->middleware('admin');
    Route::add('POST', '/add-doctor', [Controller\Admin::class, 'addDoctor'])->middleware('admin');
    Route::add('POST', '/add-patient', [Controller\Admin::class, 'addPatient'])->middleware('admin');
    Route::add('POST', '/patient-appointment', [Controller\Admin::class, 'patientAppointment'])->middleware('admin');
});
// Auth
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
// Moderator
Route::add('GET', '/reception', [Controller\Moderator::class, 'moderatorPanel'])->middleware('auth');
Route::add('POST', '/reception/register-patient', [Controller\Moderator::class, 'registerPatient']);
Route::add('POST', '/reception/record-patient', [Controller\Moderator::class, 'recordPatient']);
// Search
Route::add('GET', '/choices', [Controller\Search::class, 'choices'])->middleware('auth');
Route::add('GET', '/all-doctors', [Controller\Search::class, 'getAllDoctors']);
Route::add('GET', '/patient-diagnoses', [Controller\Search::class, 'patientDiagnoses']);
//Route::add('GET', '/choices/all-patients', [Controller\Search::class, 'getAllPatients']);
