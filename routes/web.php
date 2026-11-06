<?php

use Facade\FlareClient\View;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    $name = 'HALA';
 $departments = [
        '01' => 'Tichnical',
        '2' =>  'financial',
        '3'=> 'Sales',
    ];

    // return view('about', ['name' => $name]);
    // return view('about')->with('name', $name);
    return view('about', compact('name', 'departments'));
});

Route::post('/about', function () {
    $name = $_POST['name'] ?? '';

    $departments = [
        '01' => 'Technical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];

    return view('about', compact('name', 'departments'));
});
