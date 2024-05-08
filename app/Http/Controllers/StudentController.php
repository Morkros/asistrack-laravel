<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    public function index() : view
    {
        $students = Student::all();
        //return $students;
        return view('students.index',['students' => $students]);
    }

    public function create() : View
    {
        return view('students.create');
    }

    public function store( StoreStudentRequest $request) : RedirectResponse
    {
        Student::create($request->all());
        return redirect()->route('students.index')
                ->withSuccess('Nuevo estudiante añadido correctamente.');
    }

    public function show(Student $student) : View
    {
        return view('students.show', [
            'student' => $student
        ]);
    }

    public function edit(Student $student) : View
    {
        return view('students.edit', [
            'students' => $student
        ]);
    }

    public function update(UpdateStudentRequest $request, Student $student) : RedirectResponse
    {
        $student->update($request->all());
        return redirect()->back()
                ->withSuccess('Estudiante actualizado correctamente.');
    }
    
    public function destroy(Student $student) : RedirectResponse
    {
        $student->delete();
        return redirect()->route('students.index')
                ->withSuccess('Estudiante eliminado correctamente.');
    }
}