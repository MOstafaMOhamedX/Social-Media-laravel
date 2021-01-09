<?php


// admin

Route::middleware(['role:administrator'])->group(function () {
    Route::get('/admin' , [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::get(   '/admin/users'                , [App\Http\Controllers\UserController::class, 'index']    )->name('admin.users.index');        // All Users 
    Route::get(   '/admin/users/create'         , [App\Http\Controllers\UserController::class, 'create']   )->name('admin.users.create');       // Create User 
    Route::post(  '/admin/users/store'          , [App\Http\Controllers\UserController::class, 'store']    )->name('admin.users.store');        // Store User 
    Route::delete('/admin/user/{user}/destroy'  , [App\Http\Controllers\UserController::class, 'destroy']  )->name('admin.user.destroy');       // delete User  
    Route::put(   '/admin/user/{user}/attach'   , [App\Http\Controllers\UserController::class, 'attach']   )->name('admin.user.attach');        // attach User  
    Route::put(   '/admin/user/{user}/detatch'  , [App\Http\Controllers\UserController::class, 'detatch']  )->name('admin.user.detatch');       // detatch User  
    Route::get(   '/admin/users/{user}/profile' , [App\Http\Controllers\UserController::class, 'show']     )->name('admin.user.profile.show');  // profile page 
    Route::put(   '/admin/users/{user}/update'  , [App\Http\Controllers\UserController::class, 'update']   )->name('admin.user.profile.update');// edit profile 
});
