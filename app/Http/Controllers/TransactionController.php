<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Payment;

class TransactionController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LEVEL 1 - EASY
    |--------------------------------------------------------------------------
    */
    public function getStudents() {
        $easy = DB::select("
            SELECT students.*, enrollments.course_id, courses.course_name
            FROM students
            LEFT JOIN enrollments ON students.id = enrollments.student_id
            LEFT JOIN courses ON enrollments.course_id = courses.id
        ");

        return response()->json(['success' => true, 'easy' => $easy], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | LEVEL 2 - MODERATE
    |--------------------------------------------------------------------------
    */
    public function getEnrollments() {
        $moderate = DB::table('enrollments as e')
            ->select('e.id', 's.first_name', 's.last_name', 'c.course_name', 'e.enrollment_date')
            ->join('students as s', 's.id', '=', 'e.student_id')
            ->join('courses as c', 'c.id', '=', 'e.course_id')
            ->get();

        return response()->json(['success' => true, 'moderate' => $moderate], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | LEVEL 3 - CHALLENGING (ELOQUENT)
    |--------------------------------------------------------------------------
    */
    public function getStudentDetails() {
        $challenging = Student::with(['enrollments.course', 'payments'])->get();

        return response()->json(['success' => true, 'challenging' => $challenging], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | LEVEL 4 - DIFFICULT (ELOQUENT WITH CALLBACK)
    |--------------------------------------------------------------------------
    */
    public function getDetailedEnrollmentInfo() {
        $difficult = Enrollment::with([
            'student' => function ($query) {
                $query->select('id', 'first_name', 'last_name', 'email');
            },
            'course' => function ($query) {
                $query->select('id', 'course_name', 'description');
            },
        ])->get();

        return response()->json(['success' => true, 'difficult' => $difficult], 200);
    }
}

