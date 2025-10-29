<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EntrepreneurController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    $user = auth()->user();

    if ($user->isAdmin()) {
        return redirect()->route('admin.users.index');
    } elseif ($user->isEntrepreneur()) {
        return redirect()->route('entrepreneur.dashboard');
    } elseif ($user->isJobSeeker()) {
        return redirect()->route('job-seeker.dashboard');
    }

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Public job offers
Route::get('/job-offers', [JobOfferController::class, 'index'])->name('job-offers.index');
Route::get('/job-offers/{jobOffer}', [JobOfferController::class, 'show'])->name('job-offers.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Job applications
    Route::post('/job-offers/{jobOffer}/apply', [ApplicationController::class, 'store'])->name('applications.store');

    // Admin routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/users', [AdminController::class, 'index'])->name('users.index');
        Route::get('/users/create', [AdminController::class, 'create'])->name('users.create');
        Route::post('/users', [AdminController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [AdminController::class, 'edit'])->name('users.edit');
        Route::patch('/users/{user}', [AdminController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('users.destroy');
    });

    // Entrepreneur routes
    Route::prefix('entrepreneur')->name('entrepreneur.')->group(function () {
        Route::get('/dashboard', [EntrepreneurController::class, 'dashboard'])->name('dashboard');
        Route::get('/applications', [EntrepreneurController::class, 'applications'])->name('applications.index');
        Route::get('/applications/{application}', [EntrepreneurController::class, 'showApplication'])->name('applications.show');
        Route::patch('/applications/{application}/respond', [EntrepreneurController::class, 'respondToApplication'])->name('applications.respond');
    });

    // Job Seeker routes
    Route::prefix('job-seeker')->name('job-seeker.')->group(function () {
        Route::get('/dashboard', [JobSeekerController::class, 'dashboard'])->name('dashboard');
        Route::get('/my-applications', [JobSeekerController::class, 'myApplications'])->name('applications.index');
        Route::get('/my-applications/{application}', [JobSeekerController::class, 'showApplication'])->name('applications.show');
    });

    // Job offer CRUD (for entrepreneurs)
    Route::get('/job-offers/create', [JobOfferController::class, 'create'])->name('job-offers.create');
    Route::post('/job-offers', [JobOfferController::class, 'store'])->name('job-offers.store');
    Route::get('/job-offers/{jobOffer}/edit', [JobOfferController::class, 'edit'])->name('job-offers.edit');
    Route::patch('/job-offers/{jobOffer}', [JobOfferController::class, 'update'])->name('job-offers.update');
    Route::delete('/job-offers/{jobOffer}', [JobOfferController::class, 'destroy'])->name('job-offers.destroy');
});

require __DIR__.'/auth.php';
