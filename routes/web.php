<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\RegionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return (new LoginController())->index();

})->middleware(['auth', 'verified'])->name('dashboard');



 Route::get('/', 'App\Http\Controllers\LoginController@index');

Route::get('/listeClient',[AdminController::class, 'listeClient'])->name('listeClient');
Route::get('/listeChauffeur',[AdminController::class, 'listeChauffeur'])->name('listeChauffeur');
Route::post('region.store',[AdminController::class,'store'])->name('region.store');
Route::get('region',[RegionController::class,'index'])->name('ajoutRegion');
Route::get('enregistreRegion',[AdminController::class,'index'])->name('admin.index');
Route::post('itineraire.store2',[AdminController::class,'store2'])->name('itineraire.store2');
Route::get('update{id}',[AdminController::class,'modifier'])->name('update');
Route::patch('itineraire/update{id}', [AdminController::class, 'update'])->name('itineraire.update');
Route::delete('/delete{id}', [AdminController::class, 'destroy'])->name('itineraire.destroy');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/enregChauffeur', [ChauffeurController::class, 'enregChauffeur'])->name('enregChauffeur');
Route::post('/enregClient', [ClientController::class, 'enregClient'])->name('enregClient');
Route::post('message',[ClientController::class,'message'])->name('message');
Route::post('notifChauffeur',[ChauffeurController::class,'notifChauffeur'])->name('notifChauffeur');


Route::get('itineraire/{regionId}', [AdminController::class, 'getByRegion']);

Route::get('getTarif/{itineraireId}', [AdminController::class, 'getTarif']);


Route::get('/itineraireChauffeur/{id}',[ChauffeurController::class,'regions']);
Route::get('/itineraireClient/{id}',[ChauffeurController::class,'regions']);






/*Route::middleware()->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});
Route::middleware()->group(function () {
    Route::get('/client', [ClientController::class, 'index'])->name('client.index');
});
Route::middleware()->group(function () {
    Route::get('/chauffeur', [ChauffeurController::class, 'index'])->name('chauffeur.index');
});
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';


