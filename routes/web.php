<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Halaman utama
Route::get('/', function () {
    $books = Book::latest()->take(5)->get();
    return view('home', compact('books'));
});

// Halaman About
Route::get('/about', function () {
    return view('about');
});

// Koleksi Buku dengan pencarian
Route::get('/koleksi', function (Request $request) {
    $books = Book::query();

    if ($request->has('search')) {
        $keyword = $request->input('search');
        $books->where('title', 'like', "%$keyword%")
            ->orWhere('author', 'like', "%$keyword%")
            ->orWhere('isbn', 'like', "%$keyword%")
            ->orWhere('year', 'like', "%$keyword%");
    }

    $books = $books->paginate(10); 
    return view('koleksi', compact('books'));
});

// Grup route yang hanya bisa diakses oleh admin
Route::middleware('role:admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    });

    Route::resource('/dashboard/books', BookController::class);
    Route::resource('/dashboard/categories', CategoryController::class);
});

// Grup route untuk profil pengguna (hanya untuk pengguna yang sudah login)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'editProfile'])->name('profile.edit_profile');
    Route::put('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update_profile');
});

// Login dan Registrasi
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Register
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/unauthorized', function () {
    return view('errors.unauthorized');
});
