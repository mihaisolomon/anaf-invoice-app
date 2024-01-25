<?php

use App\Modules\Anaf\Http\Controllers\Applications\AuthorizeController;
use App\Modules\Anaf\Http\Controllers\Applications\GenerateRedirectUrlController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/testing-gdrive-oauth', function () {
    $credentials = storage_path('gdrive') . '/' . env('GDRIVE_FILE_PATH');

    $client = new Google\Client();
    $client->setAuthConfig($credentials);
    $client->setRedirectUri(env('GDRIVE_REDIRECT_URI'));
    $client->addScope("https://www.googleapis.com/auth/drive");
    $service = new Google\Service\Drive($client);

    $authUrl = $client->createAuthUrl();
    dump($authUrl);
});

Route::any('/applications/gdrive/authorize', function (\Illuminate\Http\Request $request) {
    dump($request);
});

Route::any('applications/anaf/{id}/authorize', AuthorizeController::class);

Route::get('applications/anaf/{id}/link', GenerateRedirectUrlController::class);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
