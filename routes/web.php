<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Models\Service;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Client;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    $services = Service::all();
    $projects = Project::all();
    $clients = Client::orderBy('order')->get();
    $settings = Setting::all()->pluck('value', 'key');
    return view('welcome', compact('services', 'projects', 'clients', 'settings'));
})->name('home');

Route::post('/contact', [DashboardController::class, 'submitContact'])->name('contact.submit');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/settings', [DashboardController::class, 'updateSettings'])->name('dashboard.settings.update');
    
    Route::post('/services', [DashboardController::class, 'storeService'])->name('dashboard.services.store');
    Route::put('/services/{service}', [DashboardController::class, 'updateService'])->name('dashboard.services.update');
    Route::delete('/services/{service}', [DashboardController::class, 'destroyService'])->name('dashboard.services.destroy');

    Route::post('/projects', [DashboardController::class, 'storeProject'])->name('dashboard.projects.store');
    Route::put('/projects/{project}', [DashboardController::class, 'updateProject'])->name('dashboard.projects.update');
    Route::delete('/projects/{project}', [DashboardController::class, 'destroyProject'])->name('dashboard.projects.destroy');

    Route::post('/clients', [DashboardController::class, 'storeClient'])->name('dashboard.clients.store');
    Route::put('/clients/{client}', [DashboardController::class, 'updateClient'])->name('dashboard.clients.update');
    Route::delete('/clients/{client}', [DashboardController::class, 'destroyClient'])->name('dashboard.clients.destroy');

    Route::put('/contacts/{contact}/toggle-read', [DashboardController::class, 'toggleReadContact'])->name('dashboard.contacts.toggle-read');
    Route::delete('/contacts/{contact}', [DashboardController::class, 'destroyContact'])->name('dashboard.contacts.destroy');
});
