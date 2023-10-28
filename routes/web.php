<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\NotificationController;

use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\RssfeedController;
use App\Http\Controllers\Admin\BlockedipController;
use App\Http\Controllers\Admin\FallacieController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\UserController;


use App\Http\Controllers\ForgotPaswordController;
// CMS
use App\Http\Controllers\Admin\Cms\FaqController;
use App\Http\Controllers\Admin\Cms\GalleryController;
use App\Http\Controllers\Admin\Cms\CmsPageController;

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

Route::get('/admin/login',[RegisterController::class,'index'])->name('login');
// create user with its role
Route::post('/register',[RegisterController::class,'registerUser'])->name('reg.create');
// login user
Route::post('/login',[LoginController::class,'loginUser'])->name('login.user');

Route::get('/password-forget/{token}',[ForgotPaswordController::class,'pageView'])->name('reset.pass');
Route::post('/password-reset',[ForgotPaswordController::class,'indexPageView'])->name('reset.add');

Route::prefix('admin')->middleware(['isuser:user'])->group(function(){

    // Ag grid Table
    Route::get('/fallacies',[FallacieController::class,'fallacieTable'])->name('fallacies.list');
    Route::get('/rss-feed',[RssfeedController::class,'indexTable'])->name('rss_feed.list');
    Route::get('/blocked-ips',[BlockedipController::class,'indexTable'])->name('ip_blocked.list');
    Route::get('/publications',[PublicationController::class,'indexTable'])->name('publication.list');
    Route::get('/author/all',[AuthorController::class,'getAuthors'])->name('authors.all');
    Route::get('/fallacie-articles',[FallacieController::class,'fallacieArticleTable'])->name('fallacy_article.list');
    Route::get('/faq-list',[FaqController::class,'faqTable'])->name('faqs.list');
    Route::get('/gallery-list',[GalleryController::class,'viewListGallery']);
    Route::get('/cms-page/list',[CmsPageController::class,'cmsPageList'])->name('list.cms.page');

    // role
    Route::get('/role/view',[RoleController::class,'index'])->name('role.view');
    Route::get('/add-role',[RoleController::class,'addRole']);
    Route::get('/role/edit/{id}',[RoleController::class,'editRole'])->name('role.edit');
    Route::post('/role/update',[RoleController::class,'rolePermissionsAdd'])->name('role.update');
    // permission
    Route::get('/permission',[PermissionController::class,'index'])->name('permission.table');
    Route::get('/permission/add',[PermissionController::class,'viewPermission'])->name('permission.view');
    Route::get('/permission/edit/{id}',[PermissionController::class,'editPermission'])->name('permission.edit');
    Route::post('/permission/add',[PermissionController::class,'addPermission'])->name('permission.add');
    Route::post('/permission/update',[PermissionController::class,'updatePermission'])->name('permission.update');
    Route::get('/permission/delete/{id}',[PermissionController::class,'deletePermission'])->name('permission.delete');
    
    // logout And Dashboard
    Route::get('/logout',[LoginController::class,'logoutUser'])->name('logout.user');
    Route::get('/dashboard',[LoginController::class,'dashboard'])->name('dashboard.admin');
    // password reset
    Route::get('/password-confirm',[LoginController::class,'confirmPasswordPage'])->name('dashboard.reset');
    Route::post('/password-confirm',[LoginController::class,'confirmPasswordIndex'])->name('password.change');
    // profile
    Route::get('/profile/{id}',[LoginController::class,'editProfile'])->name('profile.admin');
    Route::post('/profile',[LoginController::class,'updateProfile'])->name('update.admin');
    Route::get('/normal-user',[LoginController::class,'showNormalUserList'])->name('user.list.admin');


    
    // Fallacy
    Route::get('/fallacie',[FallacieController::class,'index'])->name('fallacy.index');
    Route::get('/fallacie/add',[FallacieController::class,'viewFallacy'])->name('fallacy.viewAdd');
    Route::post('/fallacie/add',[FallacieController::class,'addFallacy'])->name('fallacy.add');
    Route::get('/fallacie/edit/{id}',[FallacieController::class,'editFallacy'])->name('fallacy.edit');
    Route::post('/fallacie/edit',[FallacieController::class,'updateFallacy'])->name('fallacy.update');
    Route::get('/fallacie/delete/{id}',[FallacieController::class,'deleteFallacy'])->name('fallacy.delete');
    // article_fallacies
    Route::get('/fallacie-article',[FallacieController::class,'Fallaciesarticles'])->name('fallacy.views');
    // Confirmation
    Route::get('/fallacie/confirmation',[FallacieController::class,'updateConfirmation'])->name('fallacy.confirmation');
    // Publication
    Route::get('/publication',[PublicationController::class,'index'])->name('publication.index');
    Route::get('/publication/add',[PublicationController::class,'viewPublication'])->name('publication.viewAdd');
    Route::post('/publication/add',[PublicationController::class,'addPublication'])->name('publication.add');
    Route::get('/publication/edit/{id}',[PublicationController::class,'editPublication'])->name('publication.edit');
    Route::post('/publication/edit',[PublicationController::class,'updatePublication'])->name('publication.update');
    Route::get('/publication/delete/{id}',[PublicationController::class,'deletePublication'])->name('publication.delete');
    // Author
    Route::get('/author',[AuthorController::class,'index'])->name('author.index');
    Route::get('/author/add',[AuthorController::class,'viewAuthor'])->name('author.viewAdd');
    Route::post('/author/add',[AuthorController::class,'addAuthor'])->name('author.add');
    Route::get('/author/edit/{id}',[AuthorController::class,'editAuthor'])->name('author.edit');
    Route::post('/author/edit',[AuthorController::class,'updateAuthor'])->name('author.update');
    Route::get('/author/delete/{id}',[AuthorController::class,'deleteAuthor'])->name('author.delete');
    //  Rss Feed
    Route::get('/rssfeed',[RssfeedController::class,'index'])->name('rssfeed.index');
    Route::get('/rss-feed/add',[RssfeedController::class,'viewRssFeed'])->name('rssfeed.viewAdd');
    Route::post('/rss-feed/add',[RssfeedController::class,'addRssFeed'])->name('rssfeed.add');
    Route::get('/rss-feed/edit/{id}',[RssfeedController::class,'editRssFeed'])->name('rssfeed.edit');
    Route::post('/rss-feed/edit',[RssfeedController::class,'updateRssFeed'])->name('rssfeed.update');
    Route::get('/rss-feed/delete/{id}',[RssfeedController::class,'deleteRssFeed'])->name('rssfeed.delete');

    // Blocked Ip
    Route::get('/blocked-ip',[BlockedipController::class,'index'])->name('blockedip.index');
    Route::post('/blockedip/add',[BlockedipController::class,'addBlockedIp'])->name('blockedip.add');
    Route::get('/blockedip/edit/{id}',[BlockedipController::class,'editBlockedIp'])->name('blockedip.edit');
    Route::post('/blockedip/edit',[BlockedipController::class,'updateBlockedIp'])->name('blockedip.update');
    Route::get('/blockedip/delete/{id}',[BlockedipController::class,'deleteBlockedIp'])->name('blockedip.delete');
    // Faq
    Route::get('/faq',[FaqController::class,'index'])->name('faq.list');
    Route::Post('/faq/add',[FaqController::class,'addFaq'])->name('faq.add');
    Route::get('/faq/edit/{id}',[FaqController::class,'editFaq'])->name('faq.edit');
    Route::Post('/faq/edit',[FaqController::class,'updateFaq'])->name('faq.update');
    Route::get('/faq/delete/{id}',[FaqController::class,'removeFaq'])->name('faq.del');
    // cms-page
    Route::get('/cms-page',[CmsPageController::class,'index'])->name('list.page');
    Route::get('/cms-page/add',[CmsPageController::class,'addViewPage'])->name('cmspage.add');
    Route::post('/page-add',[CmsPageController::class,'addPage'])->name('add.page');
    Route::get('/cms-page/edit/{id}',[CmsPageController::class,'editCmsPage'])->name('cmspage.edit');
    Route::post('/page-edit',[CmsPageController::class,'updateCmsPage'])->name('update.page');
    Route::get('/cms-page/delete/{id}',[CmsPageController::class,'deleteCmsPage'])->name('cmspage.del');
    // menu listing 
    Route::get('/menu-list',[CmsPageController::class,'menuManage'])->name('menu.list');
    Route::post('/menu',[CmsPageController::class,'createMenu'])->name('menu.add');

    Route::get('/gallery-list',[GalleryController::class,'index'])->name('gallery.list');
    Route::post('gallery-add',[GalleryController::class,'addGallery'])->name('gallery.add');


    // Article
    Route::get('/article',[ArticleController::class,'index'])->name('article_list');
    
    Route::get('/article/all',[ArticleController::class,'showArticleList']);

    Route::get('/users',[UserController::class,'index'])->name('user.list');
    Route::get('/users-list',[UserController::class,'showUserList']);

    
});

Route::get('/{any}', function () {
    return view('welcome');
})->where('any','.*');