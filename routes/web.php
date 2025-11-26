<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Database\ItemDatabaseController;
use App\Http\Controllers\Database\MonsterDatabaseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Manager\PartnerController;
use App\Http\Controllers\Manager\PaymentController;
use App\Http\Controllers\Manager\PersonalDataController;
use App\Http\Controllers\Manager\VoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RankingController;
use App\Http\Middleware\EnsurePartner;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/download', [HomeController::class, 'download'])->name('download');
Route::get('/login', [AuthenticatedSessionController::class, 'create']);

Route::middleware(['auth'])->group(function () {
    Route::get('/manager-account', [HomeController::class, 'managerAccount'])->name('dashboard');

    Route::post('vote/{voteSite}', [VoteController::class, 'store'])->name('vote.store');

    Route::patch('personal-data', [PersonalDataController::class, 'update'])->name('personal-data.update');
    Route::patch('personal-data/password', [PersonalDataController::class, 'updatePassword'])->name('personal-data.password.update');

    Route::prefix('payment')->name('payment.')->controller(PaymentController::class)->group(function (){
        Route::post('/', 'store')->name('store');
        Route::get('/verify/{referenceId}', 'verify')->name('verify');
    });

    Route::prefix('partner')->middleware(EnsurePartner::class)->name('partner.')->controller(PartnerController::class)->group(function (){
        Route::post('/tag', 'saveTag')->name('saveTag');

        Route::prefix('withdraw')->name('withdraw.')->group(function (){
            Route::post('/', 'withdrawStore')->name('store');
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('rankings')->name('rankings.')->controller(RankingController::class)->group(function () {
    Route::get('/', 'index')->name('list');
});

Route::prefix('database')->name('database.')->group(function (){
    Route::prefix('items')->controller(ItemDatabaseController::class)->group(function (){
        Route::get('/', 'index')->name('items');
    });

    Route::prefix('monsters')->controller(MonsterDatabaseController::class)->group(function (){
        Route::get('/', 'index')->name('monsters');
    });
});

require __DIR__.'/auth.php';
require __DIR__.'/webhooks.php';

