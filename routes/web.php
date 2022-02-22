<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\PageSeo;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;


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
//     return view('welcome');
// });

$a = "shajedul";

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

//post Management
Route::resource('postCategory','App\Http\Controllers\postCategoryController');
Route::resource('postTag','App\Http\Controllers\postTagController');
Route::resource('post','App\Http\Controllers\postController');

//User Managementy


//Frontend vierw Management
Route::get('/frontpage',[App\Http\Controllers\frontendViewManagement::class,'HomePage'])->name('fhome');
Route::get('/',[App\Http\Controllers\frontendViewManagement::class,'HomePageManage']);
//Services Section
Route::get('/balance-transfer',[App\Http\Controllers\frontendViewManagement::class,'Balance_transfer']) -> name('frontend.balance_transfer');
Route::get('/bill-and-fee-payment',[App\Http\Controllers\frontendViewManagement::class,'Bill_and_Fee_payment']) -> name('frontend.billandfee');
Route::get('/balance-enquiry',[App\Http\Controllers\frontendViewManagement::class,'balanceEnquiry']) -> name('frontend.balance-enquiry');
Route::get('/corporate-service',[App\Http\Controllers\frontendViewManagement::class,'corporateService']) -> name('frontend.corporate-service');
Route::get('/mobile-topup',[App\Http\Controllers\frontendViewManagement::class,'mobileTopup']) -> name('frontend.mobile-top-up');
Route::get('/enhance-banking',[App\Http\Controllers\frontendViewManagement::class,'enhanceBanking']) -> name('frontend.enhance-Banking');
Route::get('/marchant-payment',[App\Http\Controllers\frontendViewManagement::class,'marchentPayment']) -> name('frontend.marchent-payment');
//Contact Section
Route::get('/contact',[App\Http\Controllers\frontendViewManagement::class,'contactsInfo']) -> name('frontend.contact');

//faq section

Route::get('/faq',[App\Http\Controllers\frontendViewManagement::class,'faqInfo']) -> name('frontend.faq');


//Footer

Route::get($a ,[App\Http\Controllers\frontendViewManagement::class,'AboutUs']) -> name('frontend.aboutUs');
Route::get('/service-details',[App\Http\Controllers\frontendViewManagement::class,'ServiceDetails']) -> name('frontend.service_details');
Route::get('/careers',[App\Http\Controllers\frontendViewManagement::class,'Career']) -> name('frontend.career');

//Terms & Condition

Route::get('/terms-and-condition-of-eps',[App\Http\Controllers\frontendViewManagement::class,'TermsAndCondition']) -> name('frontend.terms');


//privacy policy

Route::get('/privacy-policy',[App\Http\Controllers\frontendViewManagement::class,'PrivacyPolicy']) -> name('frontend.privacy');




// blog single view
Route::get('/blogSingleView/{id}',[App\Http\Controllers\frontendViewManagement::class,'Blog_single_view']);




//Blog Tag Search

Route::get('/blog-tag-search/{slug}',[App\Http\Controllers\frontendViewManagement::class,'Blog_search_by_tag']) ->name('blog.search.tag');

//Blog category Search

Route::get('/blog-category-search/{slug}',[App\Http\Controllers\frontendViewManagement::class,'Blog_search_by_category']) ->name('blog.search.category');
//blog post Search
Route::get('/blog-search',[App\Http\Controllers\frontendViewManagement::class,'BlogSearch']) ->name('blog.search');


Route::group(['middleware' =>'editor'],function(){

// Settings
Route::get('/settings',[App\Http\Controllers\SettingsManagement::class,'settingsView']);
Route::put('/settingsUpdate',[App\Http\Controllers\SettingsManagement::class,'settingsViewUpdate']) ->name('settings.update');
});

Route::group(['middleware' =>'commentor'],function(){
    //User Route
Route::resource('user','App\Http\Controllers\UserManagement');

    });


    // SEO Section

    Route::resource('/pageseo','App\Http\Controllers\PageSeoController');


