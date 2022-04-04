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

Route::get('cursos/inscricao/{id}', 'UserController@subscribe')->name('cursos.subscribe')->middleware('auth');
Route::get('cursos/desinscricao/{id}', 'UserController@unsubscribe')->name('cursos.unsubscribe')->middleware('auth');


Route::delete('module/{id}/delete', 'ModuleController@destroy')->name('module.destroy')->middleware('auth');
Route::delete('content/{id}/delete', 'ContentController@destroy')->name('content.destroy')->middleware('auth');

Route::get('usuarios', 'UserController@index')->name('usuarios.index')->middleware('auth');
Route::get('usuarios/detalhes/{id}', 'UserController@show')->name('usuarios.show')->middleware('auth');
Route::put('usuarios/update/{id}', 'UserController@update')->name('usuarios.update')->middleware('auth');
Route::post('usuarios/view/{id}', 'UserController@attendClass')->name('usuarios.view')->middleware('auth');

Route::get('ava', 'avaController@index')->name('ava.index')->middleware('auth');
Route::get('ava/modulos/{id}', 'avaController@showModules')->name('ava.modules')->middleware('auth');
Route::get('ava/conteudos/{id}', 'avaController@showContents')->name('ava.contents')->middleware('auth');
Route::get('ava/conteudo/{id}', 'avaController@showContent')->name('ava.content')->middleware('auth');

Route::get('relatorios', 'ReportController@index')->name('relatorios.index')->middleware('auth');
Route::get('relatorios/mais-ativos', 'ReportController@mostActiveTeachers')->name('relatorios.most_active_teachers')->middleware('auth');
Route::get('relatorios/mais-completos', 'ReportController@moreCompleteCourses')->name('relatorios.more_complete_courses')->middleware('auth');
Route::get('relatorios/total-conteudo', 'ReportController@totalContent')->name('relatorios.total_content')->middleware('auth');
Route::get('relatorios/conteudo-total', 'ReportController@allContent')->name('relatorios.all_content')->middleware('auth');
Route::get('relatorios/visualizacoes-conteudo/{id}', 'ReportController@contentViews')->name('relatorios.content_views')->middleware('auth');


Route::post('post/teste', function(Request $request) {
    $data = $request->all();
    return view('test', compact('data'));
})->name('post.test');


