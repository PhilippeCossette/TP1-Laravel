<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\City;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }
}
