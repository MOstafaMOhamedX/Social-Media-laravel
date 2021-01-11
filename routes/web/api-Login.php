<?php

Route::get('/login/Google'              , [App\Http\Controllers\auth\LoginController::class, 'redirectToGoogle'         ])->name('login-Google');
Route::get('/login/Google/Callback'     , [App\Http\Controllers\auth\LoginController::class, 'handleGoogleCallback'     ]);


// facebook will not working becouse fb didnt accept project domain  - shold bs in htdocs or in server
Route::get('/login/Facebook'            , [App\Http\Controllers\auth\LoginController::class, 'redirectToFacebook'       ])->name('login-Facebook');
Route::get('/login/facebook/callback'   , [App\Http\Controllers\auth\LoginController::class, 'handleFacebookCallback'   ]);
