<?php

use Illuminate\Support\Facades\Route;
//use app\Http\Controllers\GeneratePDFController;
use App\Http\Controllers\AssistController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ParameterController;

//Route::redirect('/', 'index'); CREA UN REDIRECT HACIA EL INDEX DE ESTUDIANTES

/* Route::get('/dashboard', function () { AL AUTENTIFICAR AL USUARIO, LO ENVIA AL DASHBOARD
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

//CONVIERTE A INDEX EN LA VISTA INICIAL
Route::get('/', [StudentController::class, 'index'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('students', StudentController::class);

    Route::get('assist', [AssistController::class,"index"])->name('assists.index');
    Route::post('assist', [AssistController::class, 'getDni'])->name('assists.getDni');
    Route::get('assist/show/{id}', [AssistController::class, "show"])->name('assists.show');
   
    //ambas rutas llevan a la misma función, pero basandose en la ruta, retornan a una vista distinta: index de estudiante o index de asistencias
    Route::post('assist/{id}', [AssistController::class,"storeInstant"])->name('assists.instant');
    Route::post('student/{id}', [AssistController::class,"storeInstant"])->name('student.instant');
    
    Route::post('calendar', [AssistController::class,"getDate"])->name('assists.getDate');
    
    Route::post('parameter', [ParameterController::class, 'store'])->name('parameter.store');
    Route::put('parameter/{id}', [ParameterController::class, 'update'])->name('parameter.update');
    Route::get('registry', [ParameterController::class, 'logList'])->name('parameter.logRegistry');	

    Route::get('parameter', [ParameterController::class, 'generatePDF'])->name('pdf.generatePDF');
    Route::post('/export/students', [ParameterController::class, 'exportStudents'])->name('export.students');

    //muestra el calendario de asistencias
    Route::get('/calendar', function () {
        return view('assists.calendar');
    })->name('calendar');
    
    //PERMITE EL USAR EL DASHBOARD (PARA EVITAR PROBLEMAS EN NAVIGATION.BLADE.APP, HASTA QUE SEA EDITADO)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
});
require __DIR__.'/auth.php';
