<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\NotificationTypeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'guest'], function () {
    Route::post('/', [LoginController::class, 'login'])->name('login.login');
    Route::get('/', [LoginController::class, 'index'])->name('login');

    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resources([
        'home' => HomeController::class,
        'comments' => CommentController::class,
        'friends' => FriendController::class,
        'genders' => GenderController::class,
        'notifications' => NotificationController::class,
        'notifications_types' => NotificationTypeController::class,
        'posts' => PostController::class,
        'reactions' => ReactionController::class,
        'roles' => RoleController::class,
    ]);

    Route::controller(UserController::class)->group(function (){
        Route::get('/account/{email}', 'show')->name('account.show');
        Route::get('/account/{email}/edit', 'edit')->name('account.edit');
        Route::put('/account/{email}', 'update')->name('account.update');
    });

    Route::post('/comments/comment/{postId}', [CommentController::class, 'comment'])->name('comments.comment');
    Route::post('/posts/react', [PostController::class, 'react'])->name('posts.react');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

});
