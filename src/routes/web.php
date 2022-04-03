<?php

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

use App\Http\Controllers\CourseController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('cursos', 'CourseController@index')->name('cursos.index');
Route::get('cursos/detalhes/{id}', 'CourseController@show')->name('cursos.show');
Route::get('cursos/cadastrar', 'CourseController@create')->name('cursos.create');
Route::post('cursos/store', 'CourseController@store')->name('cursos.store');

Route::post('post/teste', function(Request $request) {
    $data = $request->all();
    return view('test', compact('data'));
})->name('post.test');


