<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

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
//Router personalizada para llamar la funcion de index y mostrar los posteos
Route::get('/post',[App\Http\controllers\PostController::class, 'index'])->name('post.index');
Route::post('/post',[App\Http\controllers\PostController::class,'store'])->name('post.store');

Route::get('/post', function(){ 
  return view ('post');
})->name('posts.index');


require __DIR__.'/auth.php';
