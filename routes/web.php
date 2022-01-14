<?php

use App\Http\Middleware\HelloMiddleware;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('hello/{msg?}', function ($msg = 'no message.') {
//     return '<html><body><h1>Hello</h1><p>This is sample page.</p></body></html>';
// });

// Route::get('hello/{id?}/{pass?}', 'HelloController@index');

Route::get('hello', 'HelloController@index');
Route::post('hello', 'HelloController@post');
    // ->middleware('group.hello');
Route::get('hello/other', 'HelloController@other');

// Route::get('hello', 'HelloController');
