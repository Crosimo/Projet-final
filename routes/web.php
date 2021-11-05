<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ScheduleController;
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
use App\Models\User;
use Carbon\Carbon;
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




// Pages
Route::get('/about', function () {
    $headers = Header::first();
    $footers = Footer::first();
    $titres =Titre::all();
    $abouts =About::first();
    $clients = Client::all();
    $events = Event::paginate(1);
    return view('pages.about-us', compact('headers', 'footers', 'titres', 'abouts', 'events', 'clients'));
})->name('abouter');

Route::get('/class', [ClasseController::class, 'classePage' ])->name('classer');

Route::get('contact', function () {
    $headers = Header::first();
    $footers = Footer::first();
    $titres =Titre::all();
    $clients = Client::all();
    return view('pages.contact', compact('headers', 'footers', 'titres', 'clients'));
})->name('contacter');

Route::get('gallery', function () {
    $headers = Header::first();
    $footers = Footer::first();
    $titres =Titre::all();
    $clients = Client::all();
    $gallerys = Gallery::paginate(9);
    return view('pages.gallery', compact('headers', 'footers','titres', 'gallerys', 'clients'));
})->name('galleryer');


Route::get('/', [IndexController::class,'index']);
Route::resource('/backoffice/about', AboutController::class)->middleware(['admin']);
Route::resource('/backoffice/gallery', GalleryController::class)->middleware(['admin']);
Route::resource('/backoffice/event', EventController::class)->middleware(['admin']);
Route::resource('/backoffice/client', ClientController::class)->middleware(['admin']);
Route::resource('/backoffice/slider', SliderController::class)->middleware(['admin']);
Route::resource('/backoffice/classe', ClasseController::class);
Route::get("/classe/{id}", [ClasseController::class, "shower"])->name("classe.shower");
Route::resource('/backoffice/footer', FooterController::class)->middleware(['admin']);
Route::resource('/backoffice/header', HeaderController::class)->middleware(['admin']);
Route::resource('/backoffice/pricing', PricingController::class)->middleware(['admin']);
Route::resource('/backoffice/schedule', ScheduleController::class)->middleware(['admin']);
Route::resource('/backoffice/slider', SliderController::class)->middleware(['admin']);



//Email
Route::resource('/backoffice/email', EmailController::class)->middleware(['back']);
Route::get("/backoffice/emailLu", [EmailController::class, "indexLu"])->name("Lu")->middleware(['back']);
Route::get("/backoffice/emailNonLu", [EmailController::class, "indexNonLu"])->name("NonLu")->middleware(['back']);




// Route::resource('/backoffice/classe', ClasseController::class);
Route::get('inscription/{id}', [ClasseController::class, "inscription"])->name("inscription");
Route::get('desinscription/{id}', [ClasseController::class, "desinscription"])->name("classe.desinscription");
Route::get('paiement/{id}', [PaiementController::class, "index"])->name("paiement");
Route::resource('/backoffice/trainer', TrainerController::class)->middleware(['back']);
Route::post("send-mail", [MailController::class, "sendmail"])->name("sendMail");
Route::get('/backoffice', function () {
    $users = User::all();
    $classes = Classe::all();
    return view('dashboard', compact('users', 'classes'));
})->middleware(['back'])->name('dashboard');
Route::get('/profil', [UserController::class, 'profil']);
Route::put('/profil/update/{id}', [UserController::class, 'updateProfil'])->name('updateProfil');


require __DIR__.'/auth.php';
