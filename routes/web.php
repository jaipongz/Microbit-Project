<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $users = DB::table('users')->get();
    return view('index', compact('users'));
});

$controller_name = 'App\Http\Controllers\Controller';
//view path  //view name  //controller
Route::get('index',['as'=> "index",'uses'=> "$controller_name@index"]);
Route::get('edit{model}',['as'=> "edit",'uses'=> "$controller_name@edit"]);
Route::put('update{model}',['as'=> "update",'uses'=> "$controller_name@update"]);
Route::get('create',['as'=> "create",'uses'=> "$controller_name@create"]);
Route::post('store',['as'=> "store",'uses'=> "$controller_name@store"]);
Route::delete('destroy{users}',['as'=> "destroy",'uses'=> "$controller_name@destroy"]);

$module_name = "albums";
$controller_name = 'App\Http\Controllers\AlbumsController';
Route::get("$module_name",['as'=>"$module_name.index",'uses'=> "$controller_name@index"] );
Route::post("$module_name.store",['as'=>"$module_name.store",'uses'=> "$controller_name@store"] );
Route::get("$module_name.show{id}",['as'=>"$module_name.show",'uses'=> "$controller_name@show"] );

Route::post("$module_name.prompt",['as'=>"$module_name.prompt",'uses'=> "$controller_name@prompt"] );
// Route::get("$module_name.get",['as'=>"$module_name.get",'uses'=> "$controller_name@get"] );
