<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\City;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('last_name')->with('city')->paginate(16);
        return view('student-index', ['students' => $students]);
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Etudiant supprimé avec succès.');
    }

    public function create()
    {
        $cities = City::all();
        return view('student-create', ['cities' => $cities]);
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
        ]);

        Student::create($validatedData);

        return redirect()->route('students.index')->with('success', 'Etudiant créé avec succès');
    }

    public function show($id)
    {
        $student = Student::with('city')->findOrFail($id);
        return view('student-show', ['student' => $student]);
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $cities = City::all();
        return view('student-edit', ['student' => $student, 'cities' => $cities]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255|min:2',
            'last_name' => 'required|string|max:255|min:2',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone_number' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date|before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
            'address' => 'nullable|string|max:500',
            'city_id' => 'required|exists:cities,id',
        ]);

        $student->update($validatedData);

        return redirect()->route('students.show', $student->id)->with('success', 'Etudiant mis à jour avec succès.');
    }
}
