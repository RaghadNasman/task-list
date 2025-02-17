<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
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
    return  View(view:'about', data:compact('name', 'departments')) ;
});
Route::post('/about', function () {
    // Global array to recieve information from form
   $name =  $_POST['name'];//value of name attribute in input
   $departments = [
    '1' => 'Tichnical',
    '2' => 'Financial',
    '3' => 'Sales',
   ];
    return  View(view:'about', data:compact('name', 'departments')) ;
});
