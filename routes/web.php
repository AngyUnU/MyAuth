<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('develop', function(){
    return 'Welcome to Developments';
})->name('develope.index');

Route::get('develop/{develops}',function($develops){
    if($develops === '5'){
        return redirect()-> route('develope.index');
    }
   return 'Detalles del desarrollador '. $develops;
});


//Route::get('/dashboard', function () {
  //return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::view('/dashboard','dashboard')->name('dashboard');
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); 

Route::get('/post', function(){
return view ('post');
})->name('post.index');

require __DIR__.'/auth.php';
