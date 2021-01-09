<?php

//Permissions
Route::get( '/Permissions'                 , [App\Http\Controllers\PermissionController::class, 'index']   )->name('Permissions.index');
Route::post('/Permission/create/'          , [App\Http\Controllers\PermissionController::class, 'store']   )->name('Permission.store' );

Route::delete('/Permission/{Permission}/destroy' , [App\Http\Controllers\PermissionController::class, 'destroy'] )->name('Permission.destroy');             


Route::get(   '/Permissions/{Permission}/edit'    , [App\Http\Controllers\PermissionController::class, 'edit']   )->name('Permission.edit');             
Route::patch( '/Permissions/{Permission}/update'  , [App\Http\Controllers\PermissionController::class, 'update'] )->name('Permission.update');  


Route::put(   '/Permission/{Permission}/prmissionAttatch', [App\Http\Controllers\PermissionController::class, 'PermissionAttach']   )->name('Permission.role.attatch');             
Route::put(   '/Permission/{Permission}/prmissionDetatch', [App\Http\Controllers\PermissionController::class, 'PermissionDetatch']  )->name('Permission.role.detatch');        