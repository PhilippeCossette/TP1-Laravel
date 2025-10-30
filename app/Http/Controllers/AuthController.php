<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function create()
    {
        $cities = City::all();
        return view('auth.register', compact('cities'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone_number' => 'required|string|max:20',
            'birth_date' => 'required|date|before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
            'address' => 'required|string|max:500',
            'city_id' => 'required|exists:cities,id',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['first_name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        Student::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phone_number'],
            'birth_date' => $validatedData['birth_date'],
            'address' => $validatedData['address'],
            'city_id' => $validatedData['city_id'],
            'user_id' => $user->id,
        ]);

        auth()->login($user);

        return redirect()->route('home.index')->with('success', __('auth.registered'));
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home.index'))->with('success', __('auth.logged_in'));
        }

        return back()->withErrors([
            'error' => __('auth.failed'),
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home.index')->with('success', __('auth.logged_out'));
    }
}
