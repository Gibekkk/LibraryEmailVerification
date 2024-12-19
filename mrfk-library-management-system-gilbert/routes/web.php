<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\CdsController;
use App\Http\Controllers\FypsController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\JournalsController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\NewspapersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\LibrarianManagementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Middleware group untuk librarian
Route::middleware(['auth', 'librarian'])->group(function () {
    Route::resource('/books', BooksController::class);
    Route::resource('/cds', CdsController::class);
    Route::resource('/journals', JournalsController::class);
    Route::resource('/newspapers', NewspapersController::class);
    Route::resource('/fyps', FypsController::class);
});

// Middleware group untuk student
Route::middleware(['auth', 'student'])->group(function () {
    Route::resource('/studentBorrow', StudentController::class);
    Route::post('/books/{id}/borrow', [StudentController::class, 'borrow'])->name('books.borrow');
});

// Middleware group untuk public/general
Route::middleware(['auth', 'general'])->group(function () {
    Route::resource('/generalBorrow', GeneralController::class);
    Route::post('/books/{id}/borrow', [GeneralController::class, 'borrow'])->name('books.borrow');
});

// Middleware group untuk lecturer
Route::middleware(['auth', 'lecturer'])->group(function () {
    Route::resource('/lecturerBorrow', LecturerController::class);
    Route::post('/lecturer/borrow/{type}/{id}', [LecturerController::class, 'borrow'])->name('borrow.item');
});

// Middleware group untuk admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('/approval', ApprovalController::class);
    Route::resource('/librarianManagement', LibrarianManagementController::class);
    Route::put('/books/{id}/approve', [BooksController::class, 'approve'])->name('books.approve');
    Route::put('/cds/{id}/approve', [CdsController::class, 'approve'])->name('cds.approve');
    Route::put('/journals/{id}/approve', [JournalsController::class, 'approve'])->name('journals.approve');
    Route::put('/newspapers/{id}/approve', [NewspapersController::class, 'approve'])->name('newspapers.approve');
    Route::put('/fyps/{id}/approve', [FypsController::class, 'approve'])->name('fyps.approve');
});


Route::get('/dashboard', function () {
    return redirect()->route('approval.index');
})->middleware(['auth', 'admin'])->name("dashboard");

Route::get('/dashboard', function () {
    return redirect()->route('books.index');
})->middleware(['auth', 'librarian'])->name("dashboard");

Route::get('/dashboard', function () {
    return redirect()->route('lecturerBorrow.index');
})->middleware(['auth', 'lecturer'])->name("dashboard");

Route::get('/dashboard', function () {
    return redirect()->route('studentBorrow.index');
})->middleware(['auth', 'student'])->name("dashboard");

Route::get('/dashboard', function () {
    return redirect()->route('generalBorrow.index');
})->middleware(['auth', 'general'])->name("dashboard");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
