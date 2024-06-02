<?php

use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\FundraiserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

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

// cache clear
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
 });
//  cache clear

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::post('/loginto', [LoginController::class, 'loginToDonate'])->name('logintodonate');
Route::post('/user-registration', [RegisterController::class, 'uregister'])->name('uregister');
Route::get('authorized/google', [SocialLoginController::class, 'redirectToGoogle']);
Route::get('authorized/google/callback', [SocialLoginController::class, 'handleGoogleCallback']);
Route::get('authorized/facebook', [SocialLoginController::class, 'redirectToFacebook']);
Route::get('authorized/facebook/callback', [SocialLoginController::class, 'handleFacebookCallback']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [FrontendController::class, 'index'])->name('homepage');
Route::get('/about', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('/work', [FrontendController::class, 'work'])->name('frontend.work');
Route::get('/volunteer', [FrontendController::class, 'volunteer'])->name('frontend.volunteer');
Route::get('/volunteer-create', [FrontendController::class, 'volunteerCreate'])->name('frontend.volunteerform');
Route::post('/volunteer-submit', [FrontendController::class, 'volunteerStore'])->name('volunteer.store');
Route::get('/our-contributors', [FrontendController::class, 'network'])->name('frontend.network');
Route::get('/our-contributors-details', [FrontendController::class, 'getContributors'])->name('frontend.contributors');
Route::get('/trustees', [FrontendController::class, 'trustees'])->name('frontend.trustees');
Route::get('/directors', [FrontendController::class, 'directors'])->name('frontend.directors');
Route::get('/transparency', [FrontendController::class, 'news'])->name('frontend.news');


Route::get('/giftaid', [FrontendController::class, 'giftaid'])->name('frontend.giftaid');

Route::get('/advisor', [FrontendController::class, 'advisor'])->name('frontend.advisor');

Route::get('/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::get('/privacy', [FrontendController::class, 'privacy'])->name('frontend.privacy');
Route::get('/terms', [FrontendController::class, 'terms'])->name('frontend.terms');
Route::get('/faq', [FrontendController::class, 'faq'])->name('frontend.faq');
Route::get('/donation', [FrontendController::class, 'donation'])->name('frontend.donation');
Route::post('/contact-submit', [FrontendController::class, 'visitorContact'])->name('contact.submit');

// paypal payment 
Route::post('charity-pay', [PaypalController::class, 'charitypaymentpay'])->name('paypalcharitypayment');
Route::get('charity-success', [PaypalController::class, 'charitypaymentsuccess']);
Route::get('charity-error', [PaypalController::class, 'charitypaymenterror']);
// paypal payment end 


Route::get('/project-details/{id}', [ProjectController::class, 'projectDetails'])->name('projectDetails');




/*------------------------------------------
--------------------------------------------
All Normal Authenticate Routes List
--------------------------------------------
--------------------------------------------*/
Route::group(['middleware' => ['auth']], function(){



});



/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::group(['prefix' =>'user/', 'middleware' => ['auth', 'is_user']], function(){

    Route::post('profile-update', [UserController::class, 'updateProfile'])->name('user.updateprofile');
    Route::get('user-profile', [HomeController::class, 'userHome'])->name('user.profile');
    Route::post('changepassword', [UserController::class, 'changeUserPassword']);



    Route::get('donation-history', [DonationController::class, 'donationHistory'])->name('user.donationhistory');
    Route::get('all-transaction', [TransactionController::class, 'allTransaction'])->name('user.alltransaction');

});
  
/*------------------------------------------
--------------------------------------------
All Agent Routes List
--------------------------------------------
--------------------------------------------*/
Route::group(['prefix' =>'charity/', 'middleware' => ['auth', 'is_agent']], function(){
  
    
});
  

