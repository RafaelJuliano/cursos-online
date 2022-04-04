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
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ContentController;
use Illuminate\Http\Request;
use App\Models\Course\Course;

Route::get('/', function () {
    return redirect(route('home'));
});

Auth::routes();

Route::get('/home', 'CourseController@index')->name('home');

Route::get('cursos', 'CourseController@index')->name('cursos.index');
Route::get('cursos/detalhes/{id}', 'CourseController@show')->name('cursos.show');
Route::get('cursos/cadastrar', 'CourseController@create')->name('cursos.create')->middleware('auth');
Route::get('cursos/gerenciar', 'CourseController@manageCourses')->name('cursos.manage')->middleware('auth');
Route::get('cursos/editar/{id}', 'CourseController@edit')->name('cursos.edit')->middleware('auth');
Route::get('cursos/remover/{id}', 'CourseController@remove')->name('cursos.remove')->middleware('auth');

Route::post('cursos/store', 'CourseController@store')->name('cursos.store')->middleware('auth');
Route::post('cursos/{id}/update', 'CourseController@update')->name('cursos.update')->middleware('auth');
Route::delete('cursos/delete/{id}', 'CourseController@destroy')->name('cursos.destroy')->middleware('auth');


Route::delete('module/{id}/delete', 'ModuleController@destroy')->name('module.destroy')->middleware('auth');
Route::delete('content/{id}/delete', 'ContentController@destroy')->name('content.destroy')->middleware('auth');

Route::post('post/teste', function(Request $request) {
    $data = $request->all();
    return view('test', compact('data'));
})->name('post.test');


