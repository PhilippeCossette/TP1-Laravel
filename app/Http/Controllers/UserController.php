<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\City;
use App\Models\User;

class UserController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        $post = $user->posts()->latest()->get();
        $student = Student::where('user_id', $user->id)->with('city')->first();

        return view('student-show', ['user' => $user, 'student' => $student, 'posts' => $post]);
    }
}
