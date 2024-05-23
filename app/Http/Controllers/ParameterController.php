<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Assists;
use Illuminate\Support\Facades\DB;
use App\Models\Parameter;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.partials.create-or-update-parameter-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $input = $request->all();
      
        Parameter::create($input);
       
        return back()->with('status', 'success');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Parameter::find($id);
        compact($product);
        return back()->with('status', 'success');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Actualiza el objeto con los datos del request
        DB::table('parameters')
              ->where('id', $request->id)
              ->update([
                'total_class_days' => $request->total_class_days,
                'promotion' => $request->promotion,
                'regular' => $request->regular
                ]);
    
        // Redirige de vuelta con un mensaje de éxito
        return redirect()->back()
                ->withSuccess('Estudiante actualizado correctamente.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /* public function assistPercent () {
        $students = DB::select('select id, dni from students');

        $totalAssistance = [];
        foreach ($students as $student) {
            $totalAssists = DB::table('assists')
            ->where('student_id', $student->id)
            ->count();
            
           $totalAssist = $totalAssist->count();
            $totalAssistCount[] = $totalAssist;
        }
        dd($totalAssists);
        return $totalAssistCount;
    } */
}
