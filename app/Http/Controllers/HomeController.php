<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\City;

class HomeController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $cities = City::all();
        return view('index', compact('students', 'cities'));
    }
}
