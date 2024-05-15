<?php

namespace App\Http\Controllers;

use App\Models\Assist;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAssistRequest;
use App\Http\Requests\UpdateAssistRequest;

class AssistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

        return view('assists.index', ['results' => $results]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id, $date)
    {
        dd('totiao');
        /* Assist::create(['student_id' => $id,
                        'created_at' => $date]);
        return redirect()->route('assists.index')
                ->withSuccess('Asistencia añadida correctamente.'); */
                
    }

    public function storeInstant($id)
    {
        Assist::create(['student_id' => $id]);
        return redirect()->route('assists.index')
                ->withSuccess('Asistencia añadida correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Assist $assist, $dni)
    {
        /* $assist = Assist::find($dni);
        
        return view('assists.show', [
            'assist' => $assist
        ]); */
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
