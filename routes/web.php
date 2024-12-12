<?php

use App\Http\Controllers\MobilController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
