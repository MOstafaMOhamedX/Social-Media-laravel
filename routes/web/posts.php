<?php



//Posts

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');            
Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post');       

Route::middleware('auth')->group(function () {
    Route::get(   '/admin/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');                          // create post
    Route::post(  '/admin/posts/'      , [App\Http\Controllers\PostController::class, 'store'] )->name('post.store');                           // store post 
  });
  
  
  Route::middleware(['role:administrator'])->group(function () {
    Route::get(   '/posts'                      , [App\Http\Controllers\PostController::class, 'list']     )->name('posts.index');              // all posts 
  });
  
  Route::middleware(['can:delete,post'])->group(function () { 
    Route::delete('/admin/posts/{post}/destroy' , [App\Http\Controllers\PostController::class, 'destroy']  )->name('post.destroy');             // delete post 
  });
  
  Route::middleware(['can:view,post'])->group(function () {
    Route::get(   '/admin/posts/{post}/edit'    , [App\Http\Controllers\PostController::class, 'edit']     )->name('post.edit');                // edit post 
    Route::patch( '/admin/posts/{post}/update'  , [App\Http\Controllers\PostController::class, 'update']   )->name('post.update');              // Update post 
    
  });
