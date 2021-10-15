<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ArticlesController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get("/", [\App\Http\Controllers\Auth\RegisteredUserController::class,'create'])->name("home");


Route::get("/articles", [ ArticlesController::class, "liste"])->name("articles.liste");

Route::match([ "get", "post" ], "/articles/ajouter", [ ArticlesController::class, "add" ])->name("articles.add");
Route::get("/articles/fiche/{id}", [ ArticlesController::class, "show" ])->name("articles.show");
Route::match([ "get", "post" ], "/articles/modifier/{id}", [ ArticlesController::class, "edit" ])->name("articles.edit");
Route::match([ "get", "post" ], "/articles/supprimer/{id}", [ ArticlesController::class, "delete" ])->name("articles.delete");
