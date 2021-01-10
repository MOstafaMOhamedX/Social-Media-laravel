<?php

Route::get('/login/Google'              , [App\Http\Controllers\auth\LoginController::class, 'redirectToGoogle'         ])->name('login-Google');
Route::get('/login/Google/Callback'     , [App\Http\Controllers\auth\LoginController::class, 'handleGoogleCallback'     ]);

Route::get('/login/Facebook'            , [App\Http\Controllers\auth\LoginController::class, 'redirectToFacebook'       ])->name('login-Facebook');
Route::get('/login/Facebook/Callback'   , [App\Http\Controllers\auth\LoginController::class, 'handleFacebookCallback'   ]);

Route::get('/login/Githup'              , [App\Http\Controllers\auth\LoginController::class, 'redirectToGithup'         ])->name('login-Githup');
Route::get('/login/Githup/Callback'     , [App\Http\Controllers\auth\LoginController::class, 'handleGithupCallback'     ]);
