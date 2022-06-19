<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function() {
    Route::resource('categories', CategoryController::class);
});
