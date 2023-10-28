<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AuthorarticlesController;
use App\Http\Controllers\ViewArticleController;
use App\Http\Controllers\ForgotPaswordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'user'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});

// Route::get('/newarticle',[ArticlesController::class,'index']);

// get Home
Route::get('/home',[ArticlesController::class,'getHome']);

// get data by Publication
// Route::get('/pub',[ArticlesController::class,'getdatabypub']);

// for searching
Route::get('/search',[ArticlesController::class,'search']);
// Activity
Route::get('/faq',[ArticlesController::class,'getFaq']);


// Authors    /author
Route::get('/authors',[ArticlesController::class,'getAuthors']);


// 
Route::get('/publication',[ArticlesController::class,'getPublication']);

Route::post('/article-like',[ViewArticleController::class,'articleLike'])->name('article.like_dislike');
// Route::get('/like-list',[ArticlesController::class,'articleLikeList']);


// get Article Author
Route::get('/article',[ArticlesController::class,'getArticles']);
// Route::get('/articfall',[ArticlesController::class,'get_fallacies']);

// get Fallacie
Route::get('/fallacie',[ArticlesController::class,'fallacies']);


// View Article
Route::get('/article/view/{id}/{name}',[ViewArticleController::class,'viewArticle']);

Route::get('/author/view/{id}/{name}',[ViewArticleController::class,'viewAuthors']);

Route::get('/publication/view/{id}/{name}',[ViewArticleController::class,'viewPublication']);


Route::post('/fallacies/add',[ViewArticleController::class,'addFallacies']);

Route::post('/comment/view/{id}',[ViewArticleController::class,'addComment']);
Route::post('/vote/view/{id}',[ViewArticleController::class,'addVote']);

// Route::get('/validate/view',[ViewArticleController::class,'view_validate']);

Route::get('/cms',[ArticlesController::class,'getCms']);

Route::post('/forget-password',[ForgotPaswordController::class,'index']);
Route::post('/change-password',[ForgotPaswordController::class,'changePassword'])->name('password.forgot');

Route::post('/forget-username',[ForgotPaswordController::class,'changeUsername']);



 