<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::get(uri: 'tasks', action: function () {
    $tasks = DB::table(table: 'tasks')->get();
    return view(view: 'tasks', data: compact(var_name: 'tasks'));
});

Route::post(uri: 'create', action: function () {
    $task_name = $_POST['name'];

    DB::table(table: 'tasks')->insert(values: [
        'name' => $task_name
    ]);

    return redirect()->back();
});

Route::post(uri: 'delete/{id}', action: function ($id) {
    DB::table(table: 'tasks')->where(column: 'id', operator: $id)->delete();

    return redirect()->back();
});
Route::post(uri: 'edit/{id}', action: function ($id) {
    $task = DB::table(table: 'tasks')->where(column: 'id', operator: $id)->first();
    $tasks = DB::table(table: 'tasks')->get();

    return view(view: 'tasks', data: compact('task', 'tasks'));
});


Route::post(uri: 'update', action: function () {
    $id = $_POST['id'];

    DB::table(table: 'tasks')->where(column: 'id', operator: '=', value: $id)->update(values: [
        'name' => $_POST['name']
    ]);

    return redirect('/tasks');
});

