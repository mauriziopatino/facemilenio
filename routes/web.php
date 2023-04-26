<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NotificationController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resources([
    'users' => UserController::class,
    'comments' => CommentController::class,
    'friends' => FriendController::class,
    'genders' => GenderController::class,
    'notifications' => NotificationController::class,
    'notifications_types' => NotificationsTypeController::class,
    'permissions' => PermissionController::class,
    'posts' => PostController::class,
    'reactions' => ReactionController::class,
    'roles' => RoleController::class,
    'roles_permissions' => RolesPermissionController::class,
]);
