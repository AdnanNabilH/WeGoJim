<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

// 🔐 AUTH: Daftar & Login
Route::get('/daftar', [AuthController::class, 'showRegister'])->name('daftar');
Route::post('/daftar', [AuthController::class, 'register'])->name('daftar.submit');

Route::get('/masuk', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/masuk', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 🌐 Halaman umum (sebelum login)
Route::get('/', fn () => view('index'));
Route::get('/about', fn () => view('about'));
Route::get('/contact', fn () => view('contact'));
Route::get('/course', fn () => view('course'));
Route::get('/faq', function () {return view('faq');})->name('user.faqs'); 



// ✅ Halaman setelah login
Route::middleware(['auth'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/about', [UserController::class, 'about'])->name('user.about');
    Route::get('/user/course', [UserCourseController::class, 'courseList'])->name('user.courses');
    Route::get('/user/contact', [UserController::class, 'contact'])->name('user.contact');
    Route::get('/user/faqs', [UserController::class, 'faq'])->name('user.faqs');

    // Edit profil
    Route::get('/edit-profile', [UserController::class, 'editProfile'])->name('user.editprofile');
    Route::put('/edit-profile', [UserController::class, 'updateProfile'])->name('user.updateprofile');
    
    // Upload foto profil
    Route::post('/profile/photo-upload', [ProfileController::class, 'uploadPhoto'])->name('profile.photo.upload');

    // My Learning dan Wishlist
   Route::get('/my-learning', [UserCourseController::class, 'myLearning'])->name('user.mylearning');
    Route::get('/wishlist', fn () => view('wishlist'))->name('user.wishlist');

    // User Course (menampilkan course dari DB)
   Route::get('/user/course', [UserCourseController::class, 'courseList'])->name('user.courses');

});

// 📊 Halaman Admin
Route::get('/hal-admin', [AdminController::class, 'index'])->name('admin.course');

// User Management Admin
Route::post('/admin/user/store', [AdminController::class, 'store']);
Route::put('/admin/user/update/{id}', [AdminController::class, 'update']);
Route::delete('/admin/user/delete/{id}', [AdminController::class, 'destroy']);

// Course Management Admin
Route::post('/admin/course/store', [AdminController::class, 'storeCourse'])->name('admin.course.store');
Route::delete('/admin/course/delete/{id}', [AdminController::class, 'destroyCourse'])->name('admin.course.delete');

// Contact
Route::get('/contact', fn () => view('contact'));
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

//saved course

Route::post('/save-course/{course}', [UserCourseController::class, 'saveCourse'])->name('user.saveCourse');
Route::delete('/unsave-course/{course}', [UserCourseController::class, 'unsaveCourse'])->name('user.unsaveCourse');

