<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\User\IndexController::class, 'index'])->name('user.index');

Route::get('/license', [App\Http\Controllers\User\IndexController::class, 'license'])->name('user.license');
Route::get('/contacts', [App\Http\Controllers\User\IndexController::class, 'contacts'])->name('user.contacts');

Route::post('/subscribe', [App\Http\Controllers\User\SubscribeController::class, 'subscribe'])->name('subscribe');
Route::post('/contact-form', [App\Http\Controllers\User\IndexController::class, 'contact_form'])->name('contact_form');

Route::get('/posts/{id}', [App\Http\Controllers\User\PostController::class, 'show']);

Route::get('/category/{id}', [\App\Http\Controllers\User\CategoryController::class, 'get_category'])->name("user.category");
Route::get('/category/{id}/search', [\App\Http\Controllers\User\CategoryController::class, 'search_by_category'])->name("user.category.search");

Route::get('/search/tag/{id}', [\App\Http\Controllers\User\SearchController::class, 'search_by_tag'])->name("user.search_by_tag");

Route::post('/search', [\App\Http\Controllers\User\SearchController::class, 'site_search'])->name("user.search");

Route::get('/post/{id}', [\App\Http\Controllers\User\PostController::class, 'show'])->name("user.post");

Route::post('/post/add-comment', [\App\Http\Controllers\User\CommentController::class, 'add_comment'])->name("user.post.add_comment");

Route::post('save-likedislike',[\App\Http\Controllers\User\PostController::class, 'save_likedislike']);
Route::post('check-likedislike',[\App\Http\Controllers\User\PostController::class, 'check_likedislike']);


Route::group(['prefix' => 'boomee', 'middleware' => ['admin', 'auth']], function(){
    Route::get('/', [\App\Http\Controllers\Admin\IndexController::class, 'index'])->name('admin.index');

    Route::get('/comments', [\App\Http\Controllers\Admin\CommentController::class, 'index'])->name('admin.comments.index');
    Route::get('/comments/user/{id}', [\App\Http\Controllers\Admin\CommentController::class, 'showUserComments'])->name('admin.comments.user.show');
    Route::get('/comments/delete/{id}', [\App\Http\Controllers\Admin\CommentController::class, 'delete'])->name('admin.comments.delete');

    Route::get('/likes', [\App\Http\Controllers\Admin\LikeController::class, 'index'])->name('admin.likes.index');

    Route::get('/mail', [\App\Http\Controllers\Admin\MailController::class, 'mails'])->name('admin.mail');
    Route::get('/mail/show/{id}', [\App\Http\Controllers\Admin\MailController::class, 'show'])->name('admin.mail.show');
    Route::post('/mail/show/{id}/answer', [\App\Http\Controllers\Admin\MailController::class, 'answer'])->name('admin.mail.answer');
    Route::get('/mail/spam/{id}', [\App\Http\Controllers\Admin\MailController::class, 'spam'])->name('admin.mail.spam');
    Route::get('/mail/read/{id}', [\App\Http\Controllers\Admin\MailController::class, 'read'])->name('admin.mail.read');
    Route::get('/mail/ReturnFromSpam/{id}', [\App\Http\Controllers\Admin\MailController::class, 'return_from_spam'])->name('admin.mail.return_from_spam');

    Route::post('/posts/search', [\App\Http\Controllers\Admin\PostController::class, 'search'])->name('admin.posts.search');
    Route::post('/posts_preview/search', [\App\Http\Controllers\Admin\PostPreviewController::class, 'search'])->name('admin.posts_preview.search');

    Route::resources([
        'categories' => \App\Http\Controllers\Admin\CategoryController::class,
        'tags' => \App\Http\Controllers\Admin\TagController::class,
        'users' => \App\Http\Controllers\Admin\UserController::class,
        'posts' => \App\Http\Controllers\Admin\PostController::class,
        'posts_preview' => \App\Http\Controllers\Admin\PostPreviewController::class,
    ]);
});

\Illuminate\Support\Facades\Auth::routes();

//[
//    'login'    => true,
//    'logout'   => true,
//    'register' => false,
//    'reset'    => false,
//    'confirm'  => false,
//    'verify'   => false,
//]
