<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

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
// Route::get('tasks', function () {
//     $tasks = DB::table('tasks')->get();
//     return View(view: 'tasks', data: compact('tasks'));
// });
Route::get('tasks', [TaskController::class, 'index']);
// add task
// Route::post('create', function () {
//     $task_name = $_POST['name'];
//     DB::table(table: 'tasks')->insert(values: ['name' => $task_name]);
//     // return view('tasks'); couses error
//     return redirect()->back();
// });
Route::post('create', [TaskController::class, 'create']);

// delete task
// Route::post('delete/{id}' , function ($id) {
//     // DB::table('tasks') ->where(column: 'id' , operator: '=' , value: $id);
//     DB::table('tasks')->where(column: 'id', operator: $id)->delete();
//     return redirect()->back();
// });
Route::post('delete/{id}' , [TaskController::class, 'destroy'] );

//edit task
// Route::post('edit/{id}' , function ($id) {
//     $task =DB::table('tasks')->where('id',$id)->first();
//     $tasks = DB::table('tasks')->get();
//     return view('tasks',compact('task', 'tasks'));
// });
Route::post('edit/{id}' , [TaskController::class, 'edit']);

//update task
// Route::post('update',function () {
//     $id = $_POST['id'];
//     DB::table('tasks')->where('id' ,'=',$id)->update(['name' => $_POST['name']]);
//     return redirect(to: 'tasks');
// });
Route::post('update', [TaskController::class, 'update']);


// display layaout
Route::get('app', function () {
    return view ('layouts.app');
});

// user Routes
Route::get('users', [UserController::class, 'index']);
Route::post('create', [UserController::class, 'create']);
Route::post('delete/{id}', [UserController::class, 'destroy']);
Route::post('edit/{id}', [UserController::class, 'edit']);
Route::post('update', [UserController::class, 'update']);

