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

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/about', function(){
//     $nm = 'dayat';
//     return view('about', ['nama' => $nm]);
// });

// Route::get('/mahasiswa', function(){
//     return view('mahasiswa');
// });


Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/mahasiswa', 'MahasiswaController@index');

//students
Route::get('/students', 'StudentsController@index'); //mengambil semua data 
Route::get('/students/create', 'StudentsController@create');// get nampilin form
Route::get('/students/{student}', 'StudentsController@show'); //get nampilin detail 
Route::post('/students', 'StudentsController@store'); //post handle input data ke db
Route::delete('students/{student}', 'StudentsController@destroy');// hapus ke db
Route::get('students/{student}/edit', 'StudentsController@edit');//nampilim form edit || untuk ubah pake method update
Route::patch('students/{student}', 'StudentsController@update');//update ke db

// ======= Menyingkat semua route StudentController
// Route::resource('students', 'StudentsController');
// ======= Menyingkat semua route StudentController