<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\City;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('city')->paginate(16);
        return view('student-index', ['students' => $students]);
    }
}
