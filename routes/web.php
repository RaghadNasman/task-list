<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//when refresh about
Route::get('/about', function () {
    $name = 'Raghad';
    $departments = [
        '1' => 'Tichnical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];
    // return  view('about') ->with(key: 'name',value: $name);
    // return  View(view:'about', data:['name' => $name]) ;
    // return  View(view:'about', data:compact('name')) ;
    return  View(view: 'about', data: compact('name', 'departments'));
});
//when submit about form
Route::post('/about', function () {
    // Global array to recieve information from form
    $name =  $_POST['name']; //value of name attribute in input
    $departments = [
        '1' => 'Tichnical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];
    return  View(view: 'about', data: compact('name', 'departments'));
});

//tasks view
Route::get('tasks', function () {
    $tasks = DB::table('tasks')->get();
    return View(view: 'tasks', data: compact('tasks'));
});
// add task
Route::post('create', function () {
    $task_name = $_POST['name'];
    DB::table(table: 'tasks')->insert(values: ['name' => $task_name]);
    // return view('tasks'); couses error
    return redirect()->back();
});

// delete task
Route::post('delete/{id}' , function ($id) {
    // DB::table('tasks') ->where(column: 'id' , operator: '=' , value: $id);
    DB::table('tasks')->where(column: 'id', operator: $id)->delete();
    return redirect()->back();
});

//edit task
Route::post('edit/{id}' , function ($id) {
    $task =DB::table('tasks')->where('id',$id)->first();
    $tasks = DB::table('tasks')->get();
    return view('tasks',compact('task', 'tasks'));
});

//update task
Route::post('update',function () {
    $id = $_POST['id'];
    DB::table('tasks')->where('id' ,'=',$id)->update(['name' => $_POST['name']]);
    return redirect(to: 'tasks');
});
