<?php 


//Users 

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');                          
  });

  Route::middleware(['can:update,user','auth'])->group(function () { 
      Route::get(   '/user/{user}/profile' , [App\Http\Controllers\UserController::class, 'profile']     )->name('user.profile.show');  // profile page 
      Route::put(   '/user/{user}/update'  , [App\Http\Controllers\UserController::class, 'editProfile']   )->name('user.profile.update');// edit profile 
  });
  