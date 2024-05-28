



<?php
use App\Http\Controllers\usersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController; 
use App\Http\Controllers\StudentAddressController;



Route::get('/get',function(){
    return "Test api";
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/students',[StudentController::class, 'index']);

// Route::get('/csrf-token', function () {
//     return response()->json(['csrf_token' => csrf_token()]);
// })->name('csrf-token');

Route::post('/student',[StudentController::class, 'create']);
Route::get('/student-address', [StudentAddressController::class, 'getAllAddress']);
// create student address
Route::post('/student/address', [StudentAddressController::class, 'createAddress']);
//  delete student address
Route::post('/delete/{id}',[StudentAddressController::class, 'deleteAddress']);
// update student address
Route::post('/update/{id}',[StudentAddressController::class, 'updateAddress']);



// Authentication and authorization routes
Route::post('/register', [usersController::class, 'createAccount']);
Route::get('/users', [usersController::class, 'getAllusers'])->middleware('auth:sanctum');
Route::post('/login', [usersController::class, 'Login']);
Route::post('/logout',[usersController::class,'Logout'])->middleware('auth:sanctum');