



<?php
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/', function () {
echo "oliviertech student form unversity of rwanda ";
});

Route::get('/student', function () {
    return "Hello, I'm a student from the University of Rwanda.";
});