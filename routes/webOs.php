<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AssistController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

 //Route::get('/', function () {
 //    return view('welcome');
 //});

Route::get('/', function () {
    return view('students.index', [StudentController::class, 'index']);
});

Route::get('details',[ProductController::class,"details"]);

Route::post('insertProduct',[ProductController::class,"insertProduct"]);

// get con parametro id, resultado del postman un json del producto
Route::get('productoJson/{id}',[ProductController::class,"productoJson"]);

Route::resource('products', ProductController::class);
// Se usa cuando hay que hacer abm o crud, crear controlador con -r para usar todas las rutas
Route::resource('students', StudentController::class);

Route::get('assist/{dni}', [AssistController::class,"show"])->name("assists.show");

//php artisan optimize - borra cache