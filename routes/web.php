<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ExampleController::class, 'index'])->name('index');

// Route::get('/greeting', function(){
//     return view('example');
// });


// Route::get('greeting/{name}', function ($name) {
//     return view ('example', ['name' => $name]);
// });


Route::get('/show/{id}', [ExampleController::class, 'show'])->name('show');



Route::middleware(['admin'])->group(function(){
        Route::get('/create', [ExampleController::class, 'create'])->name('create');
        Route::post('/create', [ExampleController::class, 'store'])->name('store');
        Route::get('/edit/{student}', [ExampleController::class, 'edit'])->name('edit');
        Route::patch('/update/{student}', [ExampleController::class, 'update'])->name('update');
        Route::delete('/delete/{student}', [ExampleController::class, 'delete'])->name('delete');
        Route::get('/update_password', [HomeController::class, 'update_password'])->name('update_password');
        Route::patch('/store_password', [HomeController::class, 'store_password'])->name('store_password');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//storage
Route::get('/picture/create', [PictureController::class, 'create'])->name('picture.create');