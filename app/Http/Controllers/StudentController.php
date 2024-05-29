<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Student;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{

    public function index(Request $request)
    {
        $searchTerm = $request->input('name_search');

        $results = Student::where('name', 'like', '%' . $searchTerm . '%')
            ->orWhere('lastname', 'like', '%' . $searchTerm . '%')
            ->orWhereRaw("CONCAT(name, ' ', lastname) like ?", ['%' . $searchTerm . '%'])
            ->get();

        if ($results->isEmpty()) {
            $results = Student::all();
        }

        $birthday = $this->birthday();

        return view('students.index', ['results' => $results, 'birthdays' => $birthday]);
    }

    public function create(): View
    {
        return view('students.create');
    }

    public function store(StoreStudentRequest $request): RedirectResponse
    {
        //convierte la fecha de nacimiento en un objeto de carbon, luego obtiene el año actual y calcula la diferencia en años
        return redirect()->route('students.index')
            ->withSuccess('Nuevo estudiante añadido correctamente.');
    }

    public function show(Student $student): View
    {
        return view('students.show', [
            'student' => $student
        ]);
    }

    public function edit(Student $student): View
    {
        return view('students.edit', [
            'students' => $student
        ]);
    }

    public function update(UpdateStudentRequest $request, Student $student): RedirectResponse
    {
        $student->update($request->all());
        return redirect()->route('students.index')
            ->withSuccess('Estudiante actualizado correctamente.');
    }

    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();
        return redirect()->route('students.index')
            ->withSuccess('Estudiante eliminado correctamente.');
    }

    public function birthday()
    {
        $today = Carbon::now()->format('d-m');
        $students = DB::select('select name, lastname, birthdate from students');
        $birthdayboyos = [];
        foreach ($students as $student) {
            $birthday = Carbon::parse($student->birthdate)->format('d-m');
            if ($birthday === $today) {
                $birthdayboyos[] = $student;
            }
        }
        return $birthdayboyos;
    }


    //instanciando una función de otra clase
    /*     public function assistancePercentage() {
        $parameter = new ParameterController();
        return $parameter->assistPercent();
    } */
}
