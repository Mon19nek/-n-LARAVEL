<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;


Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
    Route::resource('comments', CommentController::class, ['only' => ['store']]);

    Route::middleware(\App\Http\Middleware\CheckAdmin::class)->group(function () {
        Route::resource('categories', CategoryController::class);
    });

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');


});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');  

    Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});


// Đây là dòng route resource cho PostController
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/users', [UserController::class, 'index'])->name('users.index');



Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/allposts', [PostController::class, 'allPosts'])->name('posts.all');
Route::get('/mypost', [PostController::class, 'mypost'])->name('posts.mypost');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/my-account', [UserController::class, 'myAccount'])->name('users.myAccount');
Route::get('/my-account/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/my-account/update', [UserController::class, 'update'])->name('users.update');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/users/{user}/change-role', [UserController::class, 'changeRole'])->name('users.change-role');
Route::resource('comments', CommentController::class)->except(['index', 'create', 'show']);
