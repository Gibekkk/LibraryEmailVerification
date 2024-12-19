<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\JournalsController;
use App\Http\Controllers\CDController;
use App\Http\Controllers\FinalYearProjectController;
use App\Http\Controllers\NewspaperController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, "index"])->middleware(['auth', 'App\Http\Middleware\LevelCheck:admin,librarian'])->name('dashboard');

Route::middleware(['auth', 'App\Http\Middleware\LevelCheck:admin,librarian'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/books/{sort?}', [BooksController::class, 'index'])->name('books');
    Route::get('/journals/{sort?}', [JournalsController::class, 'index'])->name('journals');
    Route::get('/cds/{sort?}', [CDController::class, 'index'])->name('cds');
    Route::get('/final_year_projects/{sort?}', [FinalYearProjectController::class, 'index'])->name('final_year_projects');
    Route::get('/newspapers/{sort?}', [NewspaperController::class, 'index'])->name('newspapers');
});

Route::middleware(['auth', 'App\Http\Middleware\LevelCheck:admin'])->group(function () {
    Route::get('/librarians', [AdminController::class, 'librarians'])->name('librarians');
    Route::post('/removeLibrarian', [AdminController::class, 'removeLibrarian'])->name('removeLibrarian');
    Route::get('/addLibrarian', [AdminController::class, 'addLibrarian'])->name('addLibrarian');
    Route::post('/addLibrarian', [AdminController::class, 'addLibrarianProcess'])->name('addLibrarianProcess');
    Route::get('/requests/{collectionType}', [AdminController::class, 'requests'])->name('requests');
    Route::post('/approveRequest/{collectionType}', [AdminController::class, 'approveRequest'])->name('approveRequest');
    Route::post('/declineRequest/{collectionType}', [AdminController::class, 'declineRequest'])->name('declineRequest');
});

Route::middleware(['auth', 'App\Http\Middleware\LevelCheck:librarian'])->group(function () {
    Route::get('/display', function () {
        redirect('books');
    })->name('display');
    Route::get('/add/books', [BooksController::class, 'addBook'])->name('books.add');
    Route::post('/add/books', [BooksController::class, 'addBookProcess'])->name('books.addProcess');
    Route::get('/add/journals', [JournalsController::class, 'addJournal'])->name('journals.add');
    Route::post('/add/journals', [JournalsController::class, 'addJournalProcess'])->name('journals.addProcess');
    Route::get('/add/cds', [CDController::class, 'addCD'])->name('cds.add');
    Route::post('/add/cds', [CDController::class, 'addCDProcess'])->name('cds.addProcess');
    Route::get('/add/newspapers', [NewspaperController::class, 'addNewspaper'])->name('newspapers.add');
    Route::post('/add/newspapers', [NewspaperController::class, 'addNewspaperProcess'])->name('newspapers.addProcess');
    Route::get('/add/final_year_projects', [FinalYearProjectController::class, 'addFyp'])->name('final_year_projects.add');
    Route::post('/add/final_year_projects', [FinalYearProjectController::class, 'addFypProcess'])->name('final_year_projects.addProcess');
});


require __DIR__ . '/auth.php';
