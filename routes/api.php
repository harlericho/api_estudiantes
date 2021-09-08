<?php

use App\Http\Controllers\AutenticarController;
use App\Http\Controllers\EstudianteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('estudiantes',[EstudianteController::class,'index']);
// Route::get('estudiantes/{estudiante}',[EstudianteController::class,'show']);
// Route::post('estudiantes',[EstudianteController::class,'store']);
// Route::put('estudiantes/{estudiante}',[EstudianteController::class,'update']);
// Route::delete('estudiantes/{estudiante}',[EstudianteController::class,'destroy']);


Route::post('registro', [AutenticarController::class, 'registroUser']);

Route::post('acceso', [AutenticarController::class, 'accesoUser']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('salir', [AutenticarController::class, 'salirUser']);
    Route::apiResource('estudiantes', EstudianteController::class);
});
