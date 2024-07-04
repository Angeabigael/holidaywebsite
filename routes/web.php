<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AuthenticateAdmin;
use App\Http\Middleware\CheckRole;

Route::get('/', function () {
    //$user = Auth::guard('admin')->user();
    //dd($user);
    return view('backend.pdf.titreconge');
});


//Route de connexion pour les utilisateurs du frontend
Route::get('/accueil', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/accueil', [App\Http\Controllers\AuthController::class, 'verifylogin'])->name('loginpost');

Route::get('/inscription', function () {return view('frontend.inscription');});
Route::post('/inscription', [App\Http\Controllers\AuthController::class, 'signup'])->name('inscription');

//Route de connexion pour les utilisateurs du backend
Route::get('admin/login', [App\Http\Controllers\AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [App\Http\Controllers\AdminLoginController::class, 'login'])->name('adminpost');
Route::get('admin/logout', [App\Http\Controllers\AdminLoginController::class, 'logout'])->middleware('guest')->name('admin.logout');

//Route::get('/presentation/success', [App\Http\Controllers\PersonnelController::class, 'show'])->name('presentation.success');


Route::middleware('auth')->group(function(){

    Route::prefix('presentation')->group(function(){
        Route::get('/', [App\Http\Controllers\PersonnelController::class, 'index'])->name('presentation');
        Route::post('/', [App\Http\Controllers\PersonnelController::class, 'validate'])->name('presentation.validate');

    });

    Route::prefix('layout')->name('layout.')->group(function(){
        Route::get('/', [App\Http\Controllers\AppController::class, 'index'])->name('accueil');
        Route::get('/demande', [App\Http\Controllers\AppController::class, 'show'])->name('demande');
        Route::post('/demande', [App\Http\Controllers\AppController::class, 'create'])->name('newdemande');
        Route::get('/apropos', [App\Http\Controllers\AppController::class, 'apropos'])->name('apropos');
    });
});

Route::middleware(AuthenticateAdmin::class)->group(function(){

    Route::get('/dashboard',[App\Http\Controllers\DashController::class, 'zindex'])->name('dashboard');

    Route::prefix('dashboard/personnel')->name('dashboard.personnel.')->group(function(){
        Route::get('/', [App\Http\Controllers\DashController::class, 'index'])
        ->middleware([CheckRole::class . ':grh'])
        ->name('index');
        Route::get('/create', [App\Http\Controllers\DashController::class, 'store'])
        ->middleware([CheckRole::class . ':grh'])
        ->name('store');
        Route::post('/create', [App\Http\Controllers\DashController::class, 'create'])->name('create');
        Route::get('/edit/{employe}', [App\Http\Controllers\DashController::class, 'edit'])->name('edit');
        Route::put('/{employe}', [App\Http\Controllers\DashController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\DashController::class, 'destroy'])->name('destroy');
        Route::get('/search', [App\Http\Controllers\DashController::class, 'show'])->name('show');
        Route::get('/download', [App\Http\Controllers\DashController::class, 'pdf'])->name('document');

        Route::get('/demande', [App\Http\Controllers\DashController::class, 'demande'])
        ->middleware([CheckRole::class . ':superieur'])
        ->name('demande');
    });

    Route::prefix('dashboard/demande')->name('dashboard.demande.')->group(function(){
        Route::get('/infos/{demande}', [App\Http\Controllers\DemandeController::class, 'index'])->name('infos');
        Route::get('/modif/{validate}', [App\Http\Controllers\DemandeController::class, 'store'])->name('modif');
        Route::post('/modif/{validate}', [App\Http\Controllers\DemandeController::class, 'edit'])->name('edit');
        Route::get('/modif/attente/{attente}', [App\Http\Controllers\DemandeController::class, 'show'])->name('show');
        Route::post('/modif/approuve/{attente}', [App\Http\Controllers\DemandeController::class, 'update'])->name('update');
        Route::get('/modif/rejet/{attente}', [App\Http\Controllers\DemandeController::class, 'rejet'])->name('rejet');
        Route::get('/modif/echec/{echec}', [App\Http\Controllers\DemandeController::class, 'echec'])->name('echec');
        Route::post('/modif/echec/{echec}', [App\Http\Controllers\DemandeController::class, 'review'])->name('review');
        Route::get('/search', [App\Http\Controllers\DemandeController::class, 'search'])->name('search');
    });

    Route::prefix('dashboard/solde')->name('dashboard.solde.')->group(function(){
        Route::get('/index', [App\Http\Controllers\SoldeController::class, 'index'])
        ->middleware([CheckRole::class . ':grh'])
        ->name('index');
        Route::get('/search', [App\Http\Controllers\SoldeController::class, 'show'])->name('show');
        Route::get('/titre', [App\Http\Controllers\SoldeController::class, 'store'])
        ->middleware([CheckRole::class . ':grh'])
        ->name('store');
        Route::get('/download{id}', [App\Http\Controllers\SoldeController::class, 'pdf'])->name('titredocument');
    });

});






