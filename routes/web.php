<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\StudentController;
  
Route::resource('students', StudentController::class);
Route::get('get-provinces', [StudentController::class, 'getProvinces'])->name('getProvinces');
Route::get('get-cities', [StudentController::class, 'getCities'])->name('getCities');
Route::get('/', [StudentController::class,'index']);

?>
