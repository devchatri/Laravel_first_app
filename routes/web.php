<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FiliereController;

Route::get('/', function () {
    return view('auth/login');
});
 
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
  
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
  
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
 
    Route::controller(EtudiantController::class)->prefix('etudiants')->group(function () {
        Route::get('', 'index')->name('etudiants');
        Route::get('/etudiants', 'index')->name('etudiants.index');
        Route::get('create', 'create')->name('etudiants.create');
        Route::post('store', 'store')->name('etudiants.store');
        Route::get('show/{id}', 'show')->name('etudiants.show');
        Route::get('edit/{id}', 'edit')->name('etudiants.edit');
        Route::put('edit/{id}', 'update')->name('etudiants.update');
        Route::delete('destroy/{id}', 'destroy')->name('etudiants.destroy');
    });

    Route::controller(FiliereController::class)->prefix('filieres')->group(function () {
        Route::get('', 'index')->name('filieres');
        Route::get('create', 'create')->name('filieres.create');
        Route::post('store', 'store')->name('filieres.store');
        Route::get('show/{id}', 'show')->name('filieres.show');
        Route::get('edit/{id}', 'edit')->name('filieres.edit');
        Route::put('edit/{id}', 'update')->name('filieres.update');
        Route::delete('destroy/{id}', 'destroy')->name('filieres.destroy');
    });
 
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});