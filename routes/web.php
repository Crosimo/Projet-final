<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\UserController;
use App\Models\About;
use App\Models\Categorie;
use App\Models\Classe;
use App\Models\Client;
use App\Models\Event;
use App\Models\Footer;
use App\Models\Gallery;
use App\Models\Header;
use App\Models\Map;
use App\Models\Newsletter;
use App\Models\Pricing;
use App\Models\Schedule;
use App\Models\Slider;
use App\Models\Tag;
use App\Models\Titre;
use App\Models\Trainer;
use Illuminate\Support\Facades\Route;

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


Route::get('/about-us', function () {
    return view('pages.about-us');
});



Route::get('/', [IndexController::class,'index']);

Route::resource('/backoffice/about', AboutController::class);
Route::resource('/backoffice/gallery', GalleryController::class);
Route::resource('/backoffice/event', EventController::class);
Route::resource('/backoffice/client', ClientController::class);
Route::resource('/backoffice/slider', SliderController::class);
Route::resource('/backoffice/classe', ClasseController::class);



//Email
Route::resource('/backoffice/email', EmailController::class);
Route::get("/backoffice/emailLu", [EmailController::class, "indexLu"])->name("Lu");
Route::get("/backoffice/emailNonLu", [EmailController::class, "indexNonLu"])->name("NonLu");



// Route::resource('/backoffice/classe', ClasseController::class);
Route::get('inscription/{id}', [ClasseController::class, "inscription"])->name("inscription");
Route::get('paiement/{id}', [PaiementController::class, "index"])->name("paiement");
Route::resource('/backoffice/trainer', TrainerController::class);
Route::post("send-mail", [MailController::class, "sendmail"])->name("sendMail");
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/profil', [UserController::class, 'profil']);
Route::put('/profil/update/{id}', [UserController::class, 'updateProfil'])->name('updateProfil');



require __DIR__.'/auth.php';
