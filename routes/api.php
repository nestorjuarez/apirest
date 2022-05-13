<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CpcodeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AutenticarController;

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



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('cpcodigo/{codigo}',[CpcodeController::class,'detalleAsenta']);
Route::post('user/registro',[AutenticarController::class,'registro']);
route::post('user/login',[AutenticarController::class,'acceso']);
route::group(['middleware' => ['auth:sanctum']], function(){
    route::post('user/cerrarsesion',[AutenticarController::class,'cerrarsesion']);
    route::get('/empleados/',[EmployeeController::class,'getEmplooyes'])->name('empleados.leerempleados');
    route::get('/empleados/{employee}',[EmployeeController::class,'show']);
    route::post('/empleados',[EmployeeController::class,'store']);
    route::put('/empleados/{employee}/update',[EmployeeController::class,'update']);
    route::delete('/empleados/{employee}',[EmployeeController::class,'delete']);

});