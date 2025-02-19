<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function(){
    $name='Shams';
    $departments = [
        '1'=>'Tichnical',
        '2'=>'Financial',
        '3'=>'Sales',
    ];
    //return view('about')->with('name',$name);
    return view('about', compact('name', 'departments'));
    //return view('about', ['name' => $name]);
});

Route::post('/about', function(){
    $name = $_POST['name'];
    $departments = [
        '1'=>'Tichnical',
        '2'=>'Financial',
        '3'=>'Sales',
    ];
    return view('about', compact('name'));
});

Route::get('tasks', function(){
    $tasks = DB::table('tasks')->get();
    return view('tasks', data: compact('tasks'));
});

Route::post('create', function(){
    $task_name = $_POST['name'];
    DB::table('tasks')->insert(['name'=>$task_name]);

    return view('tasks');
});
