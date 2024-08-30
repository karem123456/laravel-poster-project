<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use PHPUnit\Event\Test\PostConditionCalledSubscriber;

// navbar routes

Route::get('/', [PostController::class , 'home'])->name('home');

Route::get('about-me', function (){return view('about');})->name('about');

Route::get('contact-me', function (){return view('contact');})->name('contact');

Route::get('search', [PostController::class , 'search'])->name('search');

// custom login routes

route::get('/signin' ,[LoginController::class , 'signin'])->name('signin');

Route::get('/email/verify', function () {

    return view('login.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {

    $request->fulfill();
    return redirect()->route('home');
})->middleware(['signed'])->name('verification.verify');
 
Route::post('/email/verification-notification', function (Request $request) {

    $request->user()->sendEmailVerificationNotification();

    return back()->with('success', 'Verification link sent!');

})->middleware(['throttle:6,1'])->name('verification.send');

route::get('/login' ,[LoginController::class , 'login'])->name('login');

route::get('/logout' ,[LoginController::class , 'logout'])->name('logout');

route::post('/signin' ,[LoginController::class , 'signinStore'])->name('signin.store');

route::post('/login' ,[LoginController::class , 'loginStore'])->name('login.store');

route::get('forget-password' , function(){return view('login.forgetpass');})->name('forgetpass');

route::post('forget-password' , [LoginController::class , 'forgetPass'])->name('forgetpass.store');

route::get('resset-password/{token}' , function(){return view('login.ressetpass');})->name('ressetpass');

route::post('resset-password' , [LoginController::class , 'ressetPass'])->name('ressetpass.store');

// user routes

route::get('/profile/{user_id}' ,[UserController::class , 'usersprofile'])->name('usersprofile');

route::get('post/{postid}' , [PostController::class , 'view'])->name('posts.view');

route::get('categories/{category}' , [PostController::class , 'categories'])->name('categories');

// auth routes

route::group(['middleware' => ['auth','verified']] , function(){

    // user profile routes
    
    route::get('/profile' ,[UserController::class , 'profile'])->name('profile');
    
    route::get('/profile-edit' , function(){return view('profiles.edit');})->name('profile.edit');
    
    route::put('/profile-update' , [UserController::class , 'update'])->name('profile.update');
    
    // user posts routes
    
    route::get('/create-post' ,function(){return view('posts.create');})->name('posts.create');
    
    route::post('/create-post' ,[PostController::class , 'postsStore'])->name('posts.store');
    
    route::get('/edit-post/{postid}' ,[PostController::class , 'edit'])->name('posts.edit');
    
    route::put('/update-post/{postid}' ,[PostController::class , 'update'])->name('posts.update');
    
    route::delete('/delete-post/{postid}' ,[PostController::class , 'delete'])->name('posts.delete');
    
    route::post('/create-comment{postid}' , [PostController::class , 'createComment'])->name('posts.create.comment');

    route::post('contact-store' , [UserController::class , 'contact'])->name('contact.store');
});