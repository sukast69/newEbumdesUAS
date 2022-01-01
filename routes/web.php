<?php


use App\Http\Controllers\PemakaianAirController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\TarifAir2Controller;
// use App\Http\Controllers\Pengguna2Controller;
use Illuminate\Support\Facades\Route;

// use Inertia\Inertia;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });
Route::get('/', function () {
    return view('home', [
        'canLogin' => Route::has('login'),

    ]);
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->name('dashboard');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', function () {
        return view('admin.home');
    })->name('dashboard');

    Route::get('/pengguna_air', [PenggunaController::class, 'index']);

    Route::get('/pengguna_air', [PenggunaController::class, 'index'])->name('pengguna');

    Route::get('/tarif_air', [TarifAir2Controller::class, 'index']);

    Route::post('/add_pengguna', [PenggunaController::class, 'addDataPengguna']);
    Route::get('/pemakaian_air', [PemakaianAirController::class, 'addDataPemakaianAir']);

    Route::post('/pengguna_air/{id_pengguna}', [PenggunaController::class, 'update'])->name('update');
    Route::get('pengguna/delete/{id_pengguna}', [PenggunaController::class, 'delete']);
    Route::get('/create', [TarifAir2Controller::class, 'create']);

    Route::get('/read', [TarifAir2Controller::class, 'read']);
    Route::get('/show/{id_tarif}', [TarifAir2Controller::class, 'show']);
    Route::get('/update/{id_tarif}', [TarifAir2Controller::class, 'update']);

   

});