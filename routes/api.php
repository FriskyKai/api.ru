<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::get('/roles', [RoleController::class, 'index']);
Route::post('/roles/new', [RoleController::class, 'create']);
Route::get('/roles/{id}', [RoleController::class, 'view']);
Route::patch('/roles/{id}/update', [RoleController::class, 'update']);
Route::delete('/roles/{id}/delete', [RoleController::class, 'delete']);

Route::get('/users', [UserController::class, 'index']);
Route::post('/users/new', [UserController::class, 'create']);
Route::get('/users/{id}', [UserController::class, 'view']);
Route::patch('/users/{id}/update', [UserController::class, 'update']);
Route::delete('/users/{id}/delete', [UserController::class, 'delete']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories/new', [CategoryController::class, 'create']);
Route::get('/categories/{id}', [CategoryController::class, 'view']);
Route::patch('/categories/{id}/update', [CategoryController::class, 'update']);
Route::delete('/categories/{id}/delete', [CategoryController::class, 'delete']);

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products/new', [ProductController::class, 'create']);
Route::get('/products/{id}', [ProductController::class, 'view']);
Route::patch('/products/{id}/update', [ProductController::class, 'update']);
Route::delete('/products/{id}/delete', [ProductController::class, 'delete']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
