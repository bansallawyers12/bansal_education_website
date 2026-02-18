<?php

use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CaseStudyController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CmsPageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Email\ComposeEmailController;
use App\Http\Controllers\Email\DashboardController as EmailDashboardController;
use App\Http\Controllers\Email\EmailTemplateController;
use App\Http\Controllers\Email\InboundEmailController;
use App\Http\Controllers\Email\OutboundEmailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/courses', function () {
    return view('courses');
})->name('courses');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/testimonials', function () {
    return view('testimonials');
})->name('testimonials');

// Email (SendGrid): /email — Inbox, Drafts, Outbox, Sent, Trash
Route::get('/email', fn () => redirect()->route('email.dashboard'))->name('email');
Route::prefix('email')->name('email.')->group(function () {
    Route::get('/dashboard', EmailDashboardController::class)->name('dashboard');
    Route::get('/emails', [InboundEmailController::class, 'index'])->name('emails.index');
    Route::delete('/emails/inbound/{email}', [InboundEmailController::class, 'destroy'])->name('emails.inbound.destroy');
    Route::get('/emails/compose', [ComposeEmailController::class, 'create'])->name('emails.compose');
    Route::post('/emails/compose', [ComposeEmailController::class, 'store'])->name('emails.compose.store');
    Route::put('/emails/compose/{email}', [ComposeEmailController::class, 'update'])->name('emails.compose.update');
    Route::post('/emails/templates', [EmailTemplateController::class, 'store'])->name('emails.templates.store');
    Route::get('/emails/drafts', [OutboundEmailController::class, 'drafts'])->name('emails.drafts');
    Route::get('/emails/outbox', [OutboundEmailController::class, 'outbox'])->name('emails.outbox');
    Route::post('/emails/outbox/{email}/send', [OutboundEmailController::class, 'send'])->name('emails.outbox.send');
    Route::get('/emails/sent', [OutboundEmailController::class, 'sent'])->name('emails.sent');
    Route::get('/emails/trash', [OutboundEmailController::class, 'trash'])->name('emails.trash');
    Route::delete('/emails/outbound/{email}', [OutboundEmailController::class, 'destroy'])->name('emails.outbound.destroy');
    Route::get('/emails/inbound/{email}', [InboundEmailController::class, 'show'])->name('emails.show');
});

// Admin: guest-only routes (also register 'login' for framework redirects)
Route::get('/login', fn () => redirect()->route('admin.login'))->name('login');
Route::get('/admin', fn () => redirect()->route('admin.login'))->name('admin');
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login')->middleware('guest');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.post')->middleware('guest');

// Admin: authenticated + admin-only routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('cms-pages', [CmsPageController::class, 'index'])->name('cms-pages.index');
    Route::get('cms-pages/create', [CmsPageController::class, 'create'])->name('cms-pages.create');
    Route::post('cms-pages', [CmsPageController::class, 'store'])->name('cms-pages.store');
    Route::get('cms-pages/{cms_page}', [CmsPageController::class, 'show'])->name('cms-pages.show');
    Route::get('cms-pages/{cms_page}/edit', [CmsPageController::class, 'edit'])->name('cms-pages.edit');
    Route::put('cms-pages/{cms_page}', [CmsPageController::class, 'update'])->name('cms-pages.update');

    Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact_submission}', [ContactController::class, 'show'])->name('contacts.show');

    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store');

    Route::get('appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('appointments', [AppointmentController::class, 'store'])->name('appointments.store');

    Route::get('blogs/categories', [BlogController::class, 'categories'])->name('blogs.categories');
    Route::get('blogs/categories/create', [BlogController::class, 'categoriesCreate'])->name('blogs.categories.create');
    Route::post('blogs/categories', [BlogController::class, 'categoriesStore'])->name('blogs.categories.store');
    Route::get('blogs/posts', [BlogController::class, 'posts'])->name('blogs.posts');

    Route::get('case-studies', [CaseStudyController::class, 'index'])->name('case-studies.index');
});

// Contact form submission (public)
Route::post('/contact', [ContactController::class, 'storePublic'])->name('contact.store');
