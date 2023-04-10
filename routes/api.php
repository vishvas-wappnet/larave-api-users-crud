<?php

use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route for viewing all users
Route::get('users', [UsersController::class, 'index'])->name('users.index');

// Get a single user
Route::get('/users/{id}', [UsersController::class, 'show']);

// Create a new user
Route::post('/users', [UsersController::class, 'store']);

// Update a user
Route::put('/users/{id}', [UsersController::class, 'update']);

// Delete a user
Route::delete('/users/{id}', [UsersController::class, 'destroy']);





