<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;


Route::get('/', function () {
    return view('welcome');
});


//Account Controller



// Route::group(['prefix' => 'account'], function () {

//     Route::group(['middleware' => 'guest'], function () {
//         Route::get('register', [AccountController::class, 'index'])->name('account.register');
//         Route::post('registerauth', [AccountController::class, 'processregister'])->name('account.registerauth');
//         Route::get('login', [AccountController::class, 'login'])->name('account.login');
//         Route::post('loginauth', [AccountController::class, 'loginauth'])->name('account.loginauth');
//     });

//     Route::group(['middleware' => 'auth'], function () {
//         Route::get('userprofile', [AccountController::class, 'userprofile'])->name('account.userprofile');
//     });
// });




Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/search', [HomeController::class, 'search'])->name('home.search');
Route::get('/book/{id}', [HomeController::class, 'singleBook'])->name('home.singleBook');
Route::post('/store-reviews', [HomeController::class, 'store'])->name('reviews.store');

Route::get('/account/register', [AccountController::class, 'index'])->name('account.register');
Route::post('/account/registerauth', [AccountController::class, 'processregister'])->name('account.registerauth');
Route::get('/account/login', [AccountController::class, 'login'])->name('account.login');
Route::post('/account/loginauth', [AccountController::class, 'loginauth'])->name('account.loginauth');

// Routes requiring authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/account/userprofile', [AccountController::class, 'userprofile'])->name('account.userprofile');
    Route::get('/account/logout', [AccountController::class, 'logout'])->name('account.logout');
    Route::post('/account/profile/updateprofile', [AccountController::class, 'updateprofile'])->name('account.profile.updateprofile');

    Route::get('/account/books', [BookController::class, 'index'])->name('books.booklist');
    Route::get('/account/addbook', [BookController::class, 'addBook'])->name('books.addbook');
    Route::post('/account/addBookProccess', [BookController::class, 'addBookProccess'])->name('books.addBookProccess');
    Route::get('/account/book/{id}', [BookController::class, 'editbook'])->name('books.editbook');
    Route::post('/account/book/{id}', [BookController::class, 'editauth'])->name('books.editbookauth');
    Route::get('/account/dltbook/{id}', [BookController::class, 'destroy'])->name('books.dltbookauth');
});
