<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/projects', function () {
    return view('projects');
});

Route::get('/project-detail', function () {
    return view('project-detail');
});

Route::get('/contact', function () {
    return view('contact');
});