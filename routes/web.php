<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController; 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    // return view('Hello i\'m oliviertech');
    echo "Hello i'm oliviertech";
});

Route::get('/student',[StudentController::class, 'index']);

Route::get('/csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
})->name('csrf-token');

Route::post('/student',[StudentController::class, 'create']);
