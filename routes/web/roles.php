<?php


  //Roles
  Route::get( '/roles'                 , [App\Http\Controllers\RoleController::class, 'index']   )->name('roles.index');
Route::post('/role/create/'          , [App\Http\Controllers\RoleController::class, 'store']   )->name('role.store' );

Route::delete('/role/{role}/destroy' , [App\Http\Controllers\RoleController::class, 'destroy'] )->name('role.destroy');             


Route::get(   '/roles/{role}/edit'    , [App\Http\Controllers\RoleController::class, 'edit']   )->name('role.edit');             
Route::patch( '/roles/{role}/update'  , [App\Http\Controllers\RoleController::class, 'update'] )->name('role.update');  


Route::put(   '/role/{role}/prmissionAttatch', [App\Http\Controllers\RoleController::class, 'PermissionAttach']   )->name('role.permission.attatch');             
Route::put(   '/role/{role}/prmissionDetatch', [App\Http\Controllers\RoleController::class, 'PermissionDetatch']  )->name('role.permission.detatch');   
