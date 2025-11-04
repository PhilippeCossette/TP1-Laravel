<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\City;
use App\Models\User;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();

        $student = Student::where('user_id', $user->id)->with('city')->first();

        return view('student-show', ['user' => $user, 'student' => $student]);
    }
}
