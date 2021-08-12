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
$prefix_route_frontend = '';
Route::prefix($prefix_route_frontend)->group(function(){
    $controllerName = 'home';
    $controller = ucfirst($controllerName)  . 'Controller@';
    Route::get('/', $controller . 'index')->name($controllerName . '.index');
    Route::get('/movie/{id}', $controller . 'show')->name($controllerName . '.show');
});


