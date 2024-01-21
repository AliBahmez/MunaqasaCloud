<?php

use App\Http\Controllers\Account\RoleController;
use App\Http\Controllers\Account\SigninController;
use App\Http\Controllers\Account\SignoutController;
use App\Http\Controllers\Account\SignupContractorController;

use App\Http\Controllers\Account\UserController;
use App\Http\Controllers\MunaqasatCloud\ApplicantContractor;
use App\Http\Controllers\MunaqasatCloud\MyTender;
use App\Http\Controllers\MunaqasatCloud\OfferContractor;
use App\Http\Controllers\MunaqasatCloud\TenderContractor;
use App\Http\Controllers\MunaqasatCloud\TenderDocument;

use App\Http\Controllers\dashboard\ContractorDashboardController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\FoundationDashboardController;
use App\Http\Controllers\Dashboard\LandingPage;

use App\Http\Controllers\MunaqasatCloud\Organization;
use App\Http\Controllers\MunaqasatCloud\Contractors;
use App\Http\Controllers\MunaqasatCloud\Notebook;
use App\Http\Controllers\MunaqasatCloud\Tender;
use App\Http\Controllers\MunaqasatCloud\TenderOffer;
use App\Http\Controllers\Account\SignupFoundationController;
use App\Http\Controllers\MunaqasatCloud\Tendersubmitting;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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



// *******************************
Route::get('/platform/messages', function () {
    return view('back.platform.messages.messages');
})->name('back.platform.messages');

Route::get('/platform/message/offers', function () {
    return view('back.platform.messages.offers');
})->name('platform.messages.offers');

// ************************

// ******************************************************************
Route::get('/', [LandingPage::class, 'index'])->name('home.front');
Route::post('/', [LandingPage::class, 'store'])->name('home.store');
Route::get('/signin', [SigninController::class, 'view'])->name('account.front.signin');
Route::post('/signin', [SigninController::class, 'authenticate'])->name('account.front.signin.submit');
//
Route::get('/signup', [SignupContractorController::class, 'view'])->name('account.front.signup');
Route::post('/account/freelancer/store', [SignupContractorController::class, 'store'])->name('freelancer.store');
Route::post('/signinfoundation/store', [SignupFoundationController::class, 'store'])->name('FoundationRegistration.store');
Route::get('/signinfoundation', [SignupFoundationController::class, 'view'])->name('account.front.signupfoundation');
Route::get('/unauthorized', function(){return view('front.account.unauthorized');})->name('unauthorized');
   
//
Route::middleware('auth')->group(function () {
    Route::get('/platform', function () {
    return view('back.munaqasatmloud.dashboard.user.platform');
})->name('platform');

Route::get('/platform/account', function () {
    return view('back.munaqasatmloud.dashboard.user.platform');
})->name('dahshboard.user');

    Route::post('/signout', [SignoutController::class, 'signout'])->name('account.back.signout');
    Route::get('/user/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.user');
    Route::get('/foundation/dashboard', [FoundationDashboardController::class, 'dashboard'])->name('dashboard.foundation');
    Route::get('/contractor/dashboard', [ContractorDashboardController::class, 'dashboard'])->name('dashboard.contractor');
    Route::get('/platform/account/users', [UserController::class, 'index'])->name('account.back.users.index');
    Route::get('/platform/account/users/create', [UserController::class, 'create'])->name('account.back.users.create');
    Route::post('/platform/account/users/store', [UserController::class, 'store'])->name('account.back.users.store');
    Route::get('/platform/account/users/{id}/edit', [UserController::class, 'edit'])->name('account.back.users.edit');
    Route::put('/platform/account/users/{id}/update', [UserController::class, 'update'])->name('account.back.users.update');
    Route::get('/platform/account/users/{id}/show', [UserController::class, 'show'])->name('account.back.users.show');
    Route::get('/platform/account/users/{id}/delete', [UserController::class, 'delete'])->name('account.back.users.delete');
    Route::delete('/platform/account/users/{id}/destroy', [UserController::class, 'destroy'])->name('account.back.users.destroy');
    Route::get('/platform/account/roles', [RoleController::class, 'index'])->name('account.back.roles.index');
    Route::get('/platform/account/roles/create', [RoleController::class, 'create'])->name('account.back.roles.create');
    Route::post('/platform/account/roles/store', [RoleController::class, 'store'])->name('account.back.roles.store');
    Route::get('/platform/account/roles/{role}/edit', [RoleController::class, 'edit'])->name('account.back.roles.edit');
    Route::put('/platform/account/roles/{role}/update', [RoleController::class, 'update'])->name('account.back.roles.update');
    Route::get('/platform/account/roles/{role}/show', [RoleController::class, 'show'])->name('account.back.roles.show');
    Route::get('/platform/account/roles/{role}/delete', [RoleController::class, 'delete'])->name('account.back.roles.delete');
    Route::delete('/platform/account/roles/{role}/destroy', [RoleController::class, 'destroy'])->name('account.back.roles.destroy');
    
    Route::resource('/platform/contractor', Contractors::class)->only(['index', 'show', 'update']);
    Route::resource('/platform/foundations', Organization::class)->only(['index', 'show', 'update']);
    Route::resource('/tenant/tender', Tender::class);
    Route::resource('/tender/notebook', Notebook::class);
    Route::get('/tender/notebook/createnote/{id}' , [Notebook::class, 'createnote']) ->name('createnote');
    Route::resource('/tenant/offers', TenderOffer::class )->only(['index']);
    Route::get('/tenant/offers/{tenderId}/{freelancerId}', [TenderOffer::class, 'showoffers'])->name('tenant.offers.showoffers');
    Route::resource('/tenant/contractors',Tendersubmitting::class)->only(['index','show','update','destroy']);
    Route::resource('/freelancer/tendersfree' , ApplicantContractor::class)->only(['store','show']);
    Route::resource('/freelancer/notebookfreelancer', TenderDocument::class)->only(['store','show']);
    Route::resource('freelancer/tenders', TenderContractor::class)->only(['index','create','show']);
    Route::resource('/freelancer/frrelanceroffers', OfferContractor::class)->only(['index','show']);
    Route::resource('/freelancer/mytenders', MyTender::class)->only(['index',]);
    Route::get('/Tendersubmitting', [Tendersubmitting::class, 'index']);
    
});   
