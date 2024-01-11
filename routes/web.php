<?php

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

Route::any('applications/anaf/{id}/authorize', function ($id, \Illuminate\Http\Request $request) {
    dump($request->all(), auth()->user());
});

Route::get('applications/anaf/{id}/link', function ($id, \Illuminate\Http\Request $request) {
    $application = \App\Models\AnafApplication::find($id);

    $provider = new \App\Modules\Anaf\OAuth2\Client\Provider\AnafProvider(
        $application->client_id,
        $application->client_secret,
        $application->redirect_uri,
    );

    $authorizationUrl = $provider->getAuthorizationUrl();

    header('Location: ' . $authorizationUrl);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
