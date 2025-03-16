<?php

use App\Http\Controllers\TransactionController;

Route::get('/students', [TransactionController::class, 'getStudents']);
Route::get('/enrollments', [TransactionController::class, 'getEnrollments']);
Route::get('/student-details', [TransactionController::class, 'getStudentDetails']);
Route::get('/detailed-enrollment', [TransactionController::class, 'getDetailedEnrollmentInfo']);
