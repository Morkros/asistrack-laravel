<?php

namespace App\Http\Controllers;

use App\Models\Assist;
use App\Models\Student;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreAssistRequest;
use App\Http\Requests\UpdateAssistRequest;

class AssistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('assists.index');
    }

    public function getDate(Request $request)
    {
        $searchDate = $request->input('search_date');
        $searchGrade = $request->input('search_grade');

        if ($searchDate === null || $searchGrade === null) {
            return redirect()->back()->withError('Debe ingresar una fecha y un grado.');
        } else {
            // Convertir la fecha a un objeto Carbon y formatearla a 'Y-m-d' para la consulta
            $formattedDate = Carbon::createFromFormat('Y-m-d', $searchDate)->format('Y-m-d');

            // Obtener estudiantes que asistieron en la fecha especificada

            if ($searchGrade === 'Todos') {
                $assistedStudents = DB::table('assists')
                    ->join('students', 'assists.student_id', '=', 'students.id')
                    ->whereDate('assists.created_at', $formattedDate)
                    ->select('students.*')
                    ->get();
            } else {
                $assistedStudents = DB::table('assists')
                    ->join('students', 'assists.student_id', '=', 'students.id')
                    ->where('students.grade', '=', $searchGrade)
                    ->whereDate('assists.created_at', $formattedDate)
                    ->select('students.*')
                    ->get();
            }

            if ($assistedStudents->isEmpty()) {
                // Devolver la vista con los resultados
                return redirect()->route('calendar')->withError('No hay estudiantes que asistierán el día ' . $formattedDate);
            } else {
                return view('assists.calendar', ['results' => $assistedStudents]);
            }
        }
    }


    public function getDni(Request $request)
    {
        $search = $request->input('dni_search');
        $results = Student::where('dni', '=', $search)->get();

        if ($results->isEmpty()) {
            return redirect()->route('assists.index')->withError('Estudiante no encontrado.');
        }

        return view('assists.index', ['results' => $results]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('assists.create');
    }

    public function store()
    {
    }

    public function storeInstant(Request $request, $id)
    {
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $date = date('Y-m-d');

        $exists = Assist::where('student_id', $id)
            ->whereDate('created_at', $date)
            ->first();

        if (!$exists) {
            Assist::create(['student_id' => $id]);
            if ($request->is('assist/' .$id)) {
                return redirect()->route('assists.index')->withSuccess('Asistencia añadida correctamente.');
            } else {
                return redirect()->route('students.index')->withSuccess('Asistencia añadida correctamente.');
            }
        } else {
            if ($request->is('assist/' .$id)) {
                return redirect()->route('assists.index')->withError('Asistencia ya existente.');
            } else {
                return redirect()->route('students.index')->withError('Asistencia ya existente.');
            }
        }
    }
    /**
     * Display the specified resource.
     */
    public function getAssistData($id)
    {
        // Obtener las fechas en las que el alumno estuvo presente
        $presentDates = Assist::where('student_id', $id)->pluck('created_at');

        // Obtener las fechas en las que el alumno no estuvo presente
        $absentDates = Assist::where('student_id', '!=', $id)->pluck('created_at');

        // Convertir las fechas a objetos Carbon para asegurar un ordenamiento correcto
        $presentDates = $presentDates->map(function ($date) {
            return Carbon::parse($date);
        });

        $absentDates = $absentDates->map(function ($date) {
            return Carbon::parse($date);
        });

        // Combinar las fechas presentes y ausentes y ordenarlas por fecha
        $allDates = $presentDates->merge($absentDates)->sortBy(function ($date) {
            return $date;
        });

        return compact('allDates', 'presentDates');
    }

    public function show($id)
    {
        // Obtener los datos de asistencia
        $data = $this->getAssistData($id);

        // Agregar el ID al array de datos
        $data['id'] = $id;

        // Retornar la vista con los datos del estudiante, el ID y las fechas de asistencias
        return view('assists.show', $data);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assist $assist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssistRequest $request, Assist $assist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assist $assist)
    {
        //
    }
}
