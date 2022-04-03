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

Route::group(
    [

        'prefix' => 'user',

    ],

    function(){
        Auth::routes(['register'=>false]);

    });


//Route::get('/userlogin',[App\Http\Controllers\Auth\LoginController@showLoginForm]);

// Admin Dashboard

Route::group(
[

    'prefix' => 'admin',

],

function(){


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//

// Settings
Route::get('/settings',[App\Http\Controllers\SettingsManagement::class,'settingsView'])->name('settings');
Route::put('/settingsUpdate',[App\Http\Controllers\SettingsManagement::class,'settingsViewUpdate']) ->name('settings.update');
//User Route
Route::resource('user','App\Http\Controllers\UserManagement');
// SEO Section
Route::resource('/pageseo','App\Http\Controllers\PageSeoController');

//post Management
Route::resource('postCategory','App\Http\Controllers\postCategoryController');
Route::resource('postTag','App\Http\Controllers\postTagController');
Route::resource('post','App\Http\Controllers\postController');

});


  Route::resource('/backend-home','App\Http\Controllers\HomePagemanagement');


  //Slider Sections

  Route::resource('/slider','App\Http\Controllers\SliderController');
  Route::get('/slider-status-change/{id}',[App\Http\Controllers\SliderController::class,'slider_status_change']);

//benifit
Route::resource('/benifit','App\Http\Controllers\BenifitController');
Route::post('uploadImage',[App\Http\Controllers\BenifitController::class,'updateImage'])->name('upload.image');
Route::get('/benifit-status-change/{id}',[App\Http\Controllers\BenifitController::class,'benifit_status_change']);
//features section
Route::resource('/feature','App\Http\Controllers\FeatureController');
Route::get('/feature-status-change/{id}',[App\Http\Controllers\FeatureController::class,'feature_status_change']);
//Career Section
Route::resource('/backend-career','App\Http\Controllers\CareerController');
Route::get('/backend-career/{id}',[App\Http\Controllers\CareerController::class,'careerview']);

Route::get('/career-view-category/{slug}',[App\Http\Controllers\CareerController::class,'careerviewcategory']);
Route::resource('/careerCategory','App\Http\Controllers\CareerCategoryController');
Route::get('/view-category/{slug}',[App\Http\Controllers\CareerCategoryController::class,'viewcategory']);

//About us
Route::resource('/about','App\Http\Controllers\AboutUsController');
  Route::get('/about-status/{id}',[App\Http\Controllers\AboutUsController::class,'about_status_update']);
  //Menu
  Route::resource('/menu','App\Http\Controllers\MenuController');
  Route::get('/menu-status/{id}',[App\Http\Controllers\MenuController::class,'menu_status_change']);
  Route::resource('/submenu','App\Http\Controllers\SubMenuController');
    Route::get('/submenu-status/{id}',[App\Http\Controllers\SubMenuController::class,'submenu_status_change']);
//Settings
Route::get('/settings',[App\Http\Controllers\SettingsManagement::class,'settingsView']);
Route::get('/settings-map',[App\Http\Controllers\SettingsManagement::class,'eps_map']);
Route::put('/settingsUpdate',[App\Http\Controllers\SettingsManagement::class,'settingsViewUpdate']) ->name('settings.update');
Route::get('/settings-logo',[App\Http\Controllers\SettingsManagement::class,'settingsLogo'])->name('settings-logo.index');
Route::post('/settings-logo',[App\Http\Controllers\SettingsManagement::class,'store'])->name('settings-logo.store');
Route::resource('user','App\Http\Controllers\UserManagement');
Route::get('/status-change/{id}',[App\Http\Controllers\UserManagement::class,'user_status_change']);
Route::get('/role-view/{slug}',[App\Http\Controllers\RoleController::class,'roleview']);
Route::get('/admin-view/{slug}',[App\Http\Controllers\RoleController::class,'adminview']);

//Frontend vierw Management

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

Route::get('/about-us' ,[App\Http\Controllers\frontendViewManagement::class,'AboutUs']) -> name('frontend.aboutUs');
Route::get('/service-details',[App\Http\Controllers\frontendViewManagement::class,'ServiceDetails']) -> name('frontend.service_details');
Route::get('/careers',[App\Http\Controllers\frontendViewManagement::class,'Career']) -> name('frontend.career');

//Terms & Condition

Route::get('/terms-and-condition-of-eps',[App\Http\Controllers\frontendViewManagement::class,'TermsAndCondition']) -> name('frontend.terms');


//privacy policy

Route::get('/privacy-policy',[App\Http\Controllers\frontendViewManagement::class,'PrivacyPolicy']) -> name('frontend.privacy');


//Cookie policy

Route::get('/cookie',[App\Http\Controllers\frontendViewManagement::class,'Cookie']) -> name('frontend.cookie');



// blog single view
Route::get('/blogSingleView/{id}',[App\Http\Controllers\frontendViewManagement::class,'Blog_single_view']);


//Blog Tag Search

Route::get('/blog-tag-search/{slug}',[App\Http\Controllers\frontendViewManagement::class,'Blog_search_by_tag']) ->name('blog.search.tag');

//Blog category Search

Route::get('/blog-category-search/{slug}',[App\Http\Controllers\frontendViewManagement::class,'Blog_search_by_category']) ->name('blog.search.category');
//blog post Search
Route::get('/blog-search',[App\Http\Controllers\frontendViewManagement::class,'BlogSearch']) ->name('blog.search');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('role', 'App\Http\Controllers\RoleController');
    Route::resource('permission', 'App\Http\Controllers\PermissionController');





});
