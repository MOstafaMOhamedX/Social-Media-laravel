<?php




  //Comments
  Route::middleware(['auth'])->group(function () {  
    Route::post('Comment/store' , [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');
  });
  
  Route::middleware(['role:administrator'])->group(function () {
      Route::get('Comment' , [App\Http\Controllers\CommentController::class, 'index'])->name('comments.index');
      Route::patch('Comment/approve' , [App\Http\Controllers\CommentController::class, 'approve'])->name('comment.approve');
      Route::patch('Comment/approveAll' , [App\Http\Controllers\CommentController::class, 'approveAll'])->name('comment.approveAll');
  });