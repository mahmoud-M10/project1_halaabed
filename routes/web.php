<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    $name = 'HALA';

    $departments = [
        '01' => 'Technical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];

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

Route::get(uri: 'tasks', action: [TaskController::class, 'index']);

Route::post(uri: 'create', action: [TaskController::class, 'create']);

Route::post(uri: 'delete/{id}', action: [TaskController::class, 'destroy']);
Route::post(uri: 'edit/{id}', action: [TaskController::class, 'edit']);
Route::post(uri: 'update', action: [TaskController::class, 'update']);
Route::get(uri: 'app', action: function () {
    return view(view: 'layouts.app');
});
