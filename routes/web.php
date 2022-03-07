<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\OrderController;
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

//
// Route::group(['prefix'=>'superadmin','middleware'=>['auth','superadmin']],function(){
//Frontend
// Route::get('/',[App\Http\Controllers\FrontendIndexController::class,'home'])->name('website');



  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
  Auth::routes();

  //post Management
  Route::resource('postCategory','App\Http\Controllers\postCategoryController');
  Route::resource('postTag','App\Http\Controllers\postTagController');
  Route::resource('post','App\Http\Controllers\postController');

  //User Managementy


  //Frontend vierw Management
  // Route::get('/frontpage',[App\Http\Controllers\frontendViewManagement::class,'HomePage'])->name('fhome');

    Route::get('/menu',[App\Http\Controllers\frontendViewManagement::class,'menu'])->name('frontend.menu');

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

  Route::get('/about-us',[App\Http\Controllers\frontendViewManagement::class,'AboutUs']) -> name('frontend.aboutUs');
  Route::get('/service-details',[App\Http\Controllers\frontendViewManagement::class,'ServiceDetails']) -> name('frontend.service_details');
  Route::get('/careers',[App\Http\Controllers\frontendViewManagement::class,'Career']) -> name('frontend.career');


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


  Route::group(['middleware' =>'editor','superadmin'],function(){

  // Settings
  Route::get('/settings',[App\Http\Controllers\SettingsManagement::class,'settingsView']);
  Route::put('/settingsUpdate',[App\Http\Controllers\SettingsManagement::class,'settingsViewUpdate']) ->name('settings.update');
  Route::get('/settings-logo',[App\Http\Controllers\SettingsManagement::class,'settingsLogo']);

  });

  Route::group(['middleware' =>'commentor'],function(){
      //User Route
Route::resource('user','App\Http\Controllers\UserManagement');
Route::get('/status-change/{id}',[App\Http\Controllers\UserManagement::class,'status_change']);
Route::get('/user/{id}',[App\Http\Controllers\UserManagement::class,'view']);
Route::get('/user_role',[App\Http\Controllers\UserManagement::class,'role']) ->name('role.index');
Route::get('/settings',[App\Http\Controllers\SettingsManagement::class,'settingsView']);
Route::put('/settingsUpdate',[App\Http\Controllers\SettingsManagement::class,'settingsViewUpdate']) ->name('settings.update');
});
// Route::resource('/appointments', 'App\Http\Livewire\Admin\Appointments\ListAppointments');
  //Features Section
  Route::get('/features',[App\Http\Controllers\frontendViewManagement::class,'Features']) -> name('frontend.features');
  //menu

  Route::get('/status-update/{id}',[App\Http\Controllers\MenuController::class,'status_update']);
  // Route::get('/menu/{id}',[App\Http\Controllers\MenuController::class,'index']);
  //aaabout Us
  Route::resource('/about','App\Http\Controllers\AboutUsController');
  Route::get('/about-status/{id}',[App\Http\Controllers\AboutUsController::class,'about_status_update']);

  // Route::get('changeStatus', 'UserController@changeStatus');
  //submenu
  Route::resource('/submenu','App\Http\Controllers\SubmenuController');
  Route::post('Custom-sortable-submenu',[App\Http\Controllers\SubmenuController::class,'update_drag_drop_submenu']);
  //backend home page
  Route::resource('/backend-home','App\Http\Controllers\HomePagemanagement');
Route::get('/benifit-section/{id}',[App\Http\Controllers\HomePagemanagement::class,'benifit_section']);
    // Route::get('/benifit',[App\Http\Controllers\HomePagemanagement::class,'benifit']) -> name('backend.benifit');
  Route::resource('/backend-career','App\Http\Controllers\CareerController');
  Route::resource('/careerCategory','App\Http\Controllers\CareerCategoryController');
// Route for home page menu
//   Route::get('/menu','App\Http\Controllers\OrdersController@index') -> name('menu.index');
//   Route::post('/menu.store','App\Http\Controllers\OrdersController@store') -> name('menu.store');
//   Route::post('/menu.destroy/{id}','App\Http\Controllers\OrdersController@destroy') -> name('menu.destroy');
//   // Route::get('/menu-status{id}','App\Http\Controllers\OrdersController@destroy') -> name('menu_status_update');
//     Route::get('/menu-status/{id}',[App\Http\Controllers\OrdersController::class,'menu_status_update']);
//     Route::post('/menu.update/{id}',[App\Http\Controllers\OrdersController::class,'update'])->name('menu.update');
// Route::post('Custom-sortable','App\Http\Controllers\OrdersController@update_drag_drop');
//
Route::resource('/benifit','App\Http\Controllers\BenifitController');
  Route::get('/benifit/{id}',[App\Http\Controllers\BenifitController::class,'update'])-> name('benifit.update');;
  Route::get('/benifit-status-change/{id}',[App\Http\Controllers\BenifitController::class,'benifit_status_change']);
Route::resource('/feature','App\Http\Controllers\FeatureController');
  Route::get('/feature-status-change/{id}',[App\Http\Controllers\FeatureController::class,'feature_status_change']);
Route::resource('/slider','App\Http\Controllers\SliderController');
Route::get('/slider-status-change/{id}',[App\Http\Controllers\SliderController::class,'slider_status_change']);
Route::get('/settings',[App\Http\Controllers\SettingsManagement::class,'settingsView']);
Route::get('/settings-map',[App\Http\Controllers\SettingsManagement::class,'eps_map']);
Route::put('/settingsUpdate',[App\Http\Controllers\SettingsManagement::class,'settingsViewUpdate']) ->name('settings.update');
Route::get('/settings-logo',[App\Http\Controllers\SettingsManagement::class,'settingsLogo'])->name('settings-logo.index');
Route::post('/settings-logo',[App\Http\Controllers\SettingsManagement::class,'store'])->name('settings-logo.store');
