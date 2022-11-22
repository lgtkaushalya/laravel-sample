<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Builder\FallbackBuilder;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
})->middleware(['auth', 'checkuser:sasika@gmail.com']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/blog', [PostsController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}/{name}', [PostsController::class, 'show'])->whereNumber('id')->whereAlpha('name');
Route::get('/blog/{id}', [PostsController::class, 'show'])->whereNumber('id')->name('blog.show');
Route::get('/blog/create', [PostsController::class, 'create'])->name('blog.create');
Route::post('/blog',[PostsController::class, 'store'])->name('blog.store');
Route::get('/blog/edit/{id}', [PostsController::class, 'edit'])->name('blog.edit');
Route::patch('/blog/{id}',[PostsController::class, 'update'])->name('blog.update');

//Route::resource('blog', PostsController::class);

Route::get('/contact', ContactController::class);

Route::match(['GET', 'POST'], '/contactmatch', ContactController::class);

Route::any('/contactany', ContactController::class);

Route::view('/contactview', 'contact', ['name' => 'Code with Thilanka']);

Route::fallback(FallbackController::class);