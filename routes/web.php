<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Main\IndexController;
use App\Http\Controllers\Main\IndexofController;
use App\Http\Controllers\Category\CatController;
use App\Http\Controllers\Category\Post\PcController;
use App\Http\Controllers\Personal\Main\IndexmController;
use App\Http\Controllers\Post\Comment\ComStoreController;
use App\Http\Controllers\Post\Like\LikeStoreController;
use App\Http\Controllers\Post\PIndexController;
use App\Http\Controllers\Post\PshowController;
use App\Http\Controllers\Personal\Liked\IndexlController;
use App\Http\Controllers\Personal\Liked\DeletelController;
use App\Http\Controllers\Personal\Comment\IndexcController;
use App\Http\Controllers\Personal\Comment\EditcoController;
use App\Http\Controllers\Personal\Comment\UpdatecController;
use App\Http\Controllers\Personal\Comment\DeletecController;
use App\Http\Controllers\Admin\Category\CindexController;
use App\Http\Controllers\Admin\Category\CreateController;
use App\Http\Controllers\Admin\Category\StoreController;
use App\Http\Controllers\Admin\Category\ShowController;
use App\Http\Controllers\Admin\Category\EditController;
use App\Http\Controllers\Admin\Category\UpdateController;
use App\Http\Controllers\Admin\Category\DeleteController;
use App\Http\Controllers\Admin\User\CindexuController;
use App\Http\Controllers\Admin\User\CreateuController;
use App\Http\Controllers\Admin\User\StoreuController;
use App\Http\Controllers\Admin\User\ShowuController;
use App\Http\Controllers\Admin\User\EdituController;
use App\Http\Controllers\Admin\User\UpdateusController;
use App\Http\Controllers\Admin\User\DeleteuController;
use App\Http\Controllers\Admin\Post\CindexpController;
use App\Http\Controllers\Admin\Post\CreatepController;
use App\Http\Controllers\Admin\Post\StorepController;
use App\Http\Controllers\Admin\Post\ShowpController;
use App\Http\Controllers\Admin\Post\EditpController;
use App\Http\Controllers\Admin\Post\UpdatepController;
use App\Http\Controllers\Admin\Post\DeletepController;
use App\Http\Controllers\Admin\Tag\CindexcController;
use App\Http\Controllers\Admin\Tag\CreatecController;
use App\Http\Controllers\Admin\Tag\StoresController;
use App\Http\Controllers\Admin\Tag\ShowsController;
use App\Http\Controllers\Admin\Tag\EditeController;
use App\Http\Controllers\Admin\Tag\UpdateuController;
use App\Http\Controllers\Admin\Tag\DeletedController;

use App\Http\Controllers\HomeController;


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


Route::group(['namespase' => 'Main'], function () {
    Route::get('/', IndexofController::class)->name('main.index');
});

Route::group(['namespase' => 'Post', 'prefix' => 'posts'], function () {
    Route::get('/', PIndexController::class)->name('post.index');
    Route::get('/{post}', PshowController::class)->name('post.show');

   Route::group(['namespase' => 'Comment', 'prefix' => '{post}/comments'], function (){
       Route::post('/', ComStoreController::class)->name('post.comment.store');
   });
    Route::group(['namespase' => 'like', 'prefix' => '{post}.likes'], function (){
        Route::get('/', ComStoreController::class)->name('post.like.store');
    });
});

Route::group(['namespase' => 'Category', 'prefix' => 'categories'], function () {
    Route::get('/', CatController::class)->name('category.index');

    Route::group(['namespase' => 'Post', 'prefix' => '{category}/posts'], function (){
        Route::get('/', PcController::class)->name('category.post.index');
    });
});


Route::group(['namespace' => '', 'prefix' => 'personal', 'middleware' => ['auth', 'admin', 'verified']], function () {
    Route::group(['namespase' => 'Main', 'prefix' => 'main'], function () {
        Route::get('/', IndexmController::class)->name('personal.main.index');
    });
    Route::group(['namespase' => 'liked', 'prefix' => 'liked'], function () {
        Route::get('/', IndexlController::class)->name('personal.liked.index');
        Route::delete('/{post}', DeletelController::class)->name('personal.liked.delete');
    });
    Route::group(['namespase' => 'Comment', 'prefix' => 'comment'], function () {
        Route::get('/', IndexcController::class)->name('personal.comment.index');
        Route::get('/{comment}/edit', EditcoController::class)->name('personal.comment.edit');
        Route::patch('/{comment}', UpdatecController::class)->name('personal.comment.update');
        Route::delete('/{comment}', DeletecController::class)->name('personal.comment.delete');
    });
});

Route::group(['namespace' => '', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
    Route::group(['namespase' => 'Main'], function () {
        Route::get('/', CatController::class)->name('admin.main.index');
    });


    Route::group(['namespase' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', CindexpController::class)->name('admin.post.index');
        Route::get('/create', CreatepController::class)->name('admin.post.create');
        Route::post('/create', StorepController::class)->name('admin.post.store');
        Route::get('/{post}', ShowpController::class)->name('admin.post.show');
        Route::get('/{post}/edit', EditpController::class)->name('admin.post.edit');
        Route::patch('/{post}', UpdatepController::class)->name('admin.post.update');
        Route::delete('/{post}', DeletepController::class)->name('admin.post.delete');
    });
    Route::group(['namespase' => 'Comment', 'prefix' => 'categories'], function () {
        Route::get('/', CindexuController::class)->name('admin.category.index');
        Route::get('/create', CreateuController::class)->name('admin.category.create');
        Route::post('/create', StoreuController::class)->name('admin.category.store');
        Route::get('/{category}', ShowuController::class)->name('admin.category.show');
        Route::get('/{category}/edit', EdituController::class)->name('admin.category.edit');
        Route::patch('/{category}', UpdateuController::class)->name('admin.category.update');
        Route::delete('/{category}', DeleteuController::class)->name('admin.category.delete');
    });

    Route::group(['namespase' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', CindexcController::class)->name('admin.tag.index');
        Route::get('/create', CreatecController::class)->name('admin.tag.create');
        Route::post('/create', StoresController::class)->name('admin.tag.store');
        Route::get('/{tag}', ShowsController::class)->name('admin.tag.show');
        Route::get('/{tag}/edit', EditeController::class)->name('admin.tag.edit');
        Route::patch('/{tag}', UpdateuController::class)->name('admin.tag.update');
        Route::delete('/{tag}', DeletedController::class)->name('admin.tag.delete');
    });

    Route::group(['namespase' => 'user', 'prefix' => 'users'], function () {
        Route::get('/', CindexuController::class)->name('admin.user.index');
        Route::get('/create', CreateuController::class)->name('admin.user.create');
        Route::post('/create', StoreuController::class)->name('admin.user.store');
        Route::get('/{user}', ShowuController::class)->name('admin.user.show');
        Route::get('/{user}/edit', EdituController::class)->name('admin.user.edit');
        Route::patch('/{user}', UpdateusController::class)->name('admin.user.update');
        Route::delete('/{user}', DeleteuController::class)->name('admin.user.delete');
    });
});


Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
