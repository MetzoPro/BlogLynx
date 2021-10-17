<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\UserController;
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
Route::get("/", [UserController::class,'home'])->name("home");


Route::get("/articles", [ ArticlesController::class, "liste"])->name("articles.liste");

Route::match([ "get", "post" ], "/articles/ajouter", [ ArticlesController::class, "add" ])->name("articles.add");
Route::get("/articles/fiche/{id}", [ ArticlesController::class, "show" ])->name("articles.show");
Route::match([ "get", "post" ], "/articles/modifier/{id}", [ ArticlesController::class, "edit" ])->name("articles.edit");
Route::match([ "get", "post" ], "/articles/supprimer/{id}", [ ArticlesController::class, "delete" ])->name("articles.delete");
Route::match([ "get", "post" ], "/articles/enable/{id}", [ ArticlesController::class, "enable" ])->name("articles.enable");
Route::match([ "get", "post" ], "/articles/disable/{id}", [ ArticlesController::class, "disable" ])->name("articles.disable");


Route::get("/users", [ UserController::class, "liste"])->name("users.liste");

Route::match([ "get", "post" ], "/users/supprimer/{id}", [ UserController::class, "delete" ])->name("users.delete");
Route::match([ "get", "post" ], "/users/auteur/{id}", [ UserController::class, "auteur" ])->name("users.auteur");
Route::match([ "get", "post" ], "/users/moder/{id}", [ UserController::class, "moder" ])->name("users.moder");
Route::match([ "get", "post" ], "/users/admin/{id}", [ UserController::class, "admin" ])->name("users.admin");

