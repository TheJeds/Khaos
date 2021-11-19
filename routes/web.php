<?php

use App\Http\Controllers\IndexKhaosPageController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\BolsaController;
use App\Http\Controllers\ComentarioController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

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

/*Route::get('/', function () {
    return redirect('producto/');
});*/
/*
Route::get('/', function () {
    return view('khaos/index_khaos');
});

Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [IndexKhaosPageController::class, 'Index'])->name('khaos.index');

Route::get('/bolsa', [BolsaController::class, 'Index'])->name('bolsa.index');

Route::post('/bolsa', [BolsaController::class, 'Store'])->name('bolsa.store');

Route::get('/contacto', function () {
    return view('khaos/contacto_khaos');
});

Route::resource('comentario', ComentarioController::class);

Route::resource('producto', ProductoController::class);

Route::get('admin/home', [ProductoController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/auth/github/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/github/callback', function () {
    $githubUser = Socialite::driver('github')->user();

    $user = User::firstOrCreate(
        [
            'provider_id'=>$githubUser->getId(),
        ],
        [
            'email'=>$githubUser->getEmail(),
            'name'=>$githubUser->getName(),
            'provider_id'=>$githubUser->getId(),
        ],
    );

    auth()->login($user, true);

    return redirect('dashboard');

});
