<?php

// ************************************ ADMIN SECTION **********************************************

Route::prefix('admin')->group(function() {

  //------------ ADMIN LOGIN SECTION ------------

  Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Admin\LoginController@login')->name('admin.login.submit');
  Route::get('/forgot', 'Admin\LoginController@showForgotForm')->name('admin.forgot');
  Route::post('/forgot', 'Admin\LoginController@forgot')->name('admin.forgot.submit');
  Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');

  //------------ ADMIN LOGIN SECTION ENDS ------------

  //------------ ADMIN NOTIFICATION SECTION ------------

  // User Notification
  Route::get('/user/notf/show', 'Admin\NotificationController@user_notf_show')->name('user-notf-show');
  Route::get('/user/notf/count','Admin\NotificationController@user_notf_count')->name('user-notf-count');
  Route::get('/user/notf/clear','Admin\NotificationController@user_notf_clear')->name('user-notf-clear');
  // User Notification Ends

  // Order Notification
  Route::get('/order/notf/show', 'Admin\NotificationController@order_notf_show')->name('order-notf-show');
  Route::get('/order/notf/count','Admin\NotificationController@order_notf_count')->name('order-notf-count');
  Route::get('/order/notf/clear','Admin\NotificationController@order_notf_clear')->name('order-notf-clear');
  // Order Notification Ends

  // Product Notification
  Route::get('/product/notf/show', 'Admin\NotificationController@product_notf_show')->name('product-notf-show');
  Route::get('/product/notf/count','Admin\NotificationController@product_notf_count')->name('product-notf-count');
  Route::get('/product/notf/clear','Admin\NotificationController@product_notf_clear')->name('product-notf-clear');
  // Product Notification Ends

  // Product Notification
  Route::get('/conv/notf/show', 'Admin\NotificationController@conv_notf_show')->name('conv-notf-show');
  Route::get('/conv/notf/count','Admin\NotificationController@conv_notf_count')->name('conv-notf-count');
  Route::get('/conv/notf/clear','Admin\NotificationController@conv_notf_clear')->name('conv-notf-clear');
  // Product Notification Ends

  //------------ ADMIN NOTIFICATION SECTION ENDS ------------

  //------------ ADMIN DASHBOARD & PROFILE SECTION ------------
  Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');
  Route::get('/profile', 'Admin\DashboardController@profile')->name('admin.profile');
  Route::post('/profile/update', 'Admin\DashboardController@profileupdate')->name('admin.profile.update');
  Route::get('/password', 'Admin\DashboardController@passwordreset')->name('admin.password');  
  Route::post('/password/update', 'Admin\DashboardController@changepass')->name('admin.password.update');
  //------------ ADMIN DASHBOARD & PROFILE SECTION ENDS ------------

  //------------ ADMIN ORDER SECTION ------------
  Route::get('/orders/datatables/{slug}', 'Admin\OrderController@datatables')->name('admin-order-datatables'); //JSON REQUEST
  Route::get('/orders', 'Admin\OrderController@index')->name('admin-order-index');
  Route::get('/orders/pending', 'Admin\OrderController@pending')->name('admin-order-pending');
  Route::get('/orders/processing', 'Admin\OrderController@processing')->name('admin-order-processing');
  Route::get('/orders/completed', 'Admin\OrderController@completed')->name('admin-order-completed');
  Route::get('/orders/declined', 'Admin\OrderController@declined')->name('admin-order-declined');
  Route::get('/order/{id}/show', 'Admin\OrderController@show')->name('admin-order-show');
  Route::get('/order/{id1}/status/{status}', 'Admin\OrderController@status')->name('admin-order-status');
  Route::post('/order/email/', 'Admin\OrderController@emailsub')->name('admin-order-emailsub');
  //------------ ADMIN ORDER SECTION ENDS ------------


  //------------ ADMIN QUOTE SECTION ------------
  Route::get('/quotes/datatables', 'Admin\QuoteController@datatables')->name('admin-quote-datatables'); //JSON REQUEST
  Route::get('/quotes', 'Admin\QuoteController@index')->name('admin-quote-index');
  Route::get('/quotes/{id}/show', 'Admin\QuoteController@show')->name('admin-quote-show');
  Route::get('/quotes/delete/{id}', 'Admin\QuoteController@destroy')->name('admin-quote-delete');
  //------------ ADMIN QUOTE SECTION ENDS ------------


  //------------ ADMIN PRODUCT SECTION ------------

  Route::get('/plans/datatables', 'Admin\ProductController@datatables')->name('admin-prod-datatables'); //JSON REQUEST
  Route::get('/plans', 'Admin\ProductController@index')->name('admin-prod-index');
  Route::get('/plans/informations', 'Admin\ProductController@info')->name('admin-prod-info');

  // CREATE SECTION
  Route::get('/plans/create', 'Admin\ProductController@create')->name('admin-prod-create');
  Route::post('/plans/store', 'Admin\ProductController@store')->name('admin-prod-store');
  // CREATE SECTION

  // EDIT SECTION
  Route::get('/plans/edit/{id}', 'Admin\ProductController@edit')->name('admin-prod-edit');  
  Route::post('/plans/edit/{id}', 'Admin\ProductController@update')->name('admin-prod-update');  
  // EDIT SECTION ENDS

  // DELETE SECTION  
  Route::get('/plans/delete/{id}', 'Admin\ProductController@destroy')->name('admin-prod-delete'); 
  // DELETE SECTION ENDS  

  //------------ ADMIN PRODUCT SECTION ENDS------------

  //------------ ADMIN BLOG SECTION ------------

  Route::get('/blog/datatables', 'Admin\BlogController@datatables')->name('admin-blog-datatables'); //JSON REQUEST
  Route::get('/blog', 'Admin\BlogController@index')->name('admin-blog-index');
  Route::get('/blog/create', 'Admin\BlogController@create')->name('admin-blog-create');
  Route::post('/blog/create', 'Admin\BlogController@store')->name('admin-blog-store');
  Route::get('/blog/edit/{id}', 'Admin\BlogController@edit')->name('admin-blog-edit');
  Route::post('/blog/edit/{id}', 'Admin\BlogController@update')->name('admin-blog-update');  
  Route::get('/blog/delete/{id}', 'Admin\BlogController@destroy')->name('admin-blog-delete'); 
  
  Route::get('/blog/category/datatables', 'Admin\BlogCategoryController@datatables')->name('admin-cblog-datatables'); //JSON REQUEST
  Route::get('/blog/category', 'Admin\BlogCategoryController@index')->name('admin-cblog-index');
  Route::get('/blog/category/create', 'Admin\BlogCategoryController@create')->name('admin-cblog-create');
  Route::post('/blog/category/create', 'Admin\BlogCategoryController@store')->name('admin-cblog-store');
  Route::get('/blog/category/edit/{id}', 'Admin\BlogCategoryController@edit')->name('admin-cblog-edit');
  Route::post('/blog/category/edit/{id}', 'Admin\BlogCategoryController@update')->name('admin-cblog-update');  
  Route::get('/blog/category/delete/{id}', 'Admin\BlogCategoryController@destroy')->name('admin-cblog-delete'); 

  //------------ ADMIN BLOG SECTION ENDS ------------

  //------------ ADMIN SLIDER SECTION ------------

  Route::get('/slider/datatables', 'Admin\SliderController@datatables')->name('admin-sl-datatables'); //JSON REQUEST
  Route::get('/slider', 'Admin\SliderController@index')->name('admin-sl-index');
  Route::get('/slider/create', 'Admin\SliderController@create')->name('admin-sl-create');
  Route::post('/slider/create', 'Admin\SliderController@store')->name('admin-sl-store');
  Route::get('/slider/edit/{id}', 'Admin\SliderController@edit')->name('admin-sl-edit');
  Route::post('/slider/edit/{id}', 'Admin\SliderController@update')->name('admin-sl-update');  
  Route::get('/slider/delete/{id}', 'Admin\SliderController@destroy')->name('admin-sl-delete'); 

  //------------ ADMIN SLIDER SECTION ENDS ------------

  //------------ ADMIN CATEGORY SECTION ------------

  Route::get('/category/datatables', 'Admin\CategoryController@datatables')->name('admin-cat-datatables'); //JSON REQUEST
  Route::get('/category', 'Admin\CategoryController@index')->name('admin-cat-index');
  Route::get('/category/create', 'Admin\CategoryController@create')->name('admin-cat-create');
  Route::post('/category/create', 'Admin\CategoryController@store')->name('admin-cat-store');
  Route::get('/category/edit/{id}', 'Admin\CategoryController@edit')->name('admin-cat-edit');
  Route::post('/category/edit/{id}', 'Admin\CategoryController@update')->name('admin-cat-update');
  Route::get('/category/delete/{id}', 'Admin\CategoryController@destroy')->name('admin-cat-delete');
  Route::get('/category/status/{id1}/{id2}', 'Admin\CategoryController@status')->name('admin-cat-status');

  
  //------------ ADMIN CATEGORY SECTION ENDS------------

  //------------ ADMIN SERVICE SECTION ------------

  Route::get('/service/datatables', 'Admin\ServiceController@datatables')->name('admin-service-datatables'); //JSON REQUEST
  Route::get('/service', 'Admin\ServiceController@index')->name('admin-service-index');
  Route::get('/service/create', 'Admin\ServiceController@create')->name('admin-service-create');
  Route::post('/service/create', 'Admin\ServiceController@store')->name('admin-service-store');
  Route::get('/service/edit/{id}', 'Admin\ServiceController@edit')->name('admin-service-edit');
  Route::post('/service/edit/{id}', 'Admin\ServiceController@update')->name('admin-service-update');  
  Route::get('/service/delete/{id}', 'Admin\ServiceController@destroy')->name('admin-service-delete'); 

  //------------ ADMIN SERVICE SECTION ENDS ------------

  //------------ ADMIN PORTFOLIO SECTION ------------

Route::get('/project/datatables', 'Admin\PortfolioController@datatables')->name('admin-portfolio-datatables');
Route::get('/projects', 'Admin\PortfolioController@index')->name('admin-portfolio-index');
Route::get('/projects/create', 'Admin\PortfolioController@create')->name('admin-portfolio-create');
Route::post('/projects/create', 'Admin\PortfolioController@store')->name('admin-portfolio-store');
Route::get('/projects/edit/{id}', 'Admin\PortfolioController@edit')->name('admin-portfolio-edit');
Route::post('/projects/edit/{id}', 'Admin\PortfolioController@update')->name('admin-portfolio-update');
Route::get('/projects/delete/{id}', 'Admin\PortfolioController@destroy')->name('admin-portfolio-delete');

  //------------ ADMIN PORTFOLIO SECTION ENDS ------------

  //------------ ADMIN MEMBER SECTION ------------

Route::get('/member/datatables', 'Admin\MemberController@datatables')->name('admin-member-datatables');
Route::get('/member', 'Admin\MemberController@index')->name('admin-member-index');
Route::get('/member/create', 'Admin\MemberController@create')->name('admin-member-create');
Route::post('/member/create', 'Admin\MemberController@store')->name('admin-member-store');
Route::get('/member/edit/{id}', 'Admin\MemberController@edit')->name('admin-member-edit');
Route::post('/member/edit/{id}', 'Admin\MemberController@update')->name('admin-member-update');
Route::get('/member/delete/{id}', 'Admin\MemberController@destroy')->name('admin-member-delete');

  //------------ ADMIN MEMBER SECTION ENDS ------------

  //------------ ADMIN PRESENTATION SECTION ------------

Route::get('/vpresentation/datatables', 'Admin\VpresentationController@datatables')->name('admin-vpresentation-datatables');
Route::get('/vpresentation', 'Admin\VpresentationController@index')->name('admin-vpresentation-index');
Route::get('/vpresentation/create', 'Admin\VpresentationController@create')->name('admin-vpresentation-create');
Route::post('/vpresentation/create', 'Admin\VpresentationController@store')->name('admin-vpresentation-store');
Route::get('/vpresentation/edit/{id}', 'Admin\VpresentationController@edit')->name('admin-vpresentation-edit');
Route::post('/vpresentation/edit/{id}', 'Admin\VpresentationController@update')->name('admin-vpresentation-update');
Route::get('/vpresentation/delete/{id}', 'Admin\VpresentationController@destroy')->name('admin-vpresentation-delete');

  //------------ ADMIN PRESENTATION SECTION ENDS ------------

  //------------ ADMIN REVIEW SECTION ------------

  Route::get('/review/datatables', 'Admin\ReviewController@datatables')->name('admin-review-datatables'); //JSON REQUEST
  Route::get('/review', 'Admin\ReviewController@index')->name('admin-review-index');
  Route::get('/review/create', 'Admin\ReviewController@create')->name('admin-review-create');
  Route::post('/review/create', 'Admin\ReviewController@store')->name('admin-review-store');
  Route::get('/review/edit/{id}', 'Admin\ReviewController@edit')->name('admin-review-edit');
  Route::post('/review/edit/{id}', 'Admin\ReviewController@update')->name('admin-review-update');  
  Route::get('/review/delete/{id}', 'Admin\ReviewController@destroy')->name('admin-review-delete'); 

  //------------ ADMIN REVIEW SECTION ENDS ------------

/*-------------------  Experience Section -------------------*/

Route::get('/experience/datatables', 'Admin\ExperienceController@datatables')->name('admin-experience-datatables');
Route::get('/experience', 'Admin\ExperienceController@index')->name('admin-experience-index');
Route::get('/experience/create', 'Admin\ExperienceController@create')->name('admin-experience-create');
Route::post('/experience/create', 'Admin\ExperienceController@store')->name('admin-experience-store');
Route::get('/experience/edit/{id}', 'Admin\ExperienceController@edit')->name('admin-experience-edit');
Route::post('/experience/edit/{id}', 'Admin\ExperienceController@update')->name('admin-experience-update');
Route::get('/experience/delete/{id}', 'Admin\ExperienceController@destroy')->name('admin-experience-delete');

/*-------------------  Experience Section Ends -------------------*/
  

  //------------ ADMIN GENERAL SETTINGS SECTION ------------

  Route::get('/general-settings/logo', 'Admin\GeneralSettingController@logo')->name('admin-gs-logo');
  Route::get('/general-settings/favicon', 'Admin\GeneralSettingController@fav')->name('admin-gs-fav');
  Route::get('/general-settings/loader', 'Admin\GeneralSettingController@load')->name('admin-gs-load');
  Route::get('/general-settings/service', 'Admin\GeneralSettingController@service')->name('admin-gs-service');
  Route::get('/general-settings/contents', 'Admin\GeneralSettingController@contents')->name('admin-gs-contents');
  Route::get('/general-settings/success', 'Admin\GeneralSettingController@success')->name('admin-gs-success');
  Route::get('/general-settings/footer', 'Admin\GeneralSettingController@footer')->name('admin-gs-footer');
  Route::get('/general-settings/error', 'Admin\GeneralSettingController@error')->name('admin-gs-error');
  Route::get('/general-settings/breadcumb', 'Admin\GeneralSettingController@breadcumb')->name('admin-gs-breadcumb');

  
  Route::group(['middleware'=>'admininistrator'],function(){

  //------------ ADMIN GENERAL SETTINGS JSON SECTION ------------

  // General Setting Section

  Route::get('/general-settings/disqus/{status}', 'Admin\GeneralSettingController@isdisqus')->name('admin-gs-isdisqus'); 
  Route::get('/general-settings/admin/loader/{status}', 'Admin\GeneralSettingController@isadminloader')->name('admin-gs-is-admin-loader'); 
  Route::get('/general-settings/loader/{status}', 'Admin\GeneralSettingController@isloader')->name('admin-gs-isloader'); 
  Route::get('/general-settings/talkto/{status}', 'Admin\GeneralSettingController@talkto')->name('admin-gs-talkto');

  // Payment Setting Section

  Route::get('/general-settings/guest/{status}', 'Admin\GeneralSettingController@guest')->name('admin-gs-guest');
  Route::get('/general-settings/paypal/{status}', 'Admin\GeneralSettingController@paypal')->name('admin-gs-paypal');
  Route::get('/general-settings/molly/{status}', 'Admin\GeneralSettingController@molly')->name('admin-gs-molly');
  Route::get('/general-settings/stripe/{status}', 'Admin\GeneralSettingController@stripe')->name('admin-gs-stripe');
  Route::get('/general-settings/cod/{status}', 'Admin\GeneralSettingController@cod')->name('admin-gs-cod');

  //  Comment Section

  Route::get('/general-settings/comment/{status}', 'Admin\GeneralSettingController@comment')->name('admin-gs-iscomment'); 


  //  Language Section

  Route::get('/general-settings/language/{status}', 'Admin\GeneralSettingController@language')->name('admin-gs-islanguage'); 

  //  Currency Section

  Route::get('/general-settings/currency/{status}', 'Admin\GeneralSettingController@currency')->name('admin-gs-iscurrency'); 

  //  Affilte Section

  Route::get('/general-settings/affilate/{status}', 'Admin\GeneralSettingController@isaffilate')->name('admin-gs-isaffilate'); 

  //------------ ADMIN GENERAL SETTINGS JSON SECTION ENDS------------

  Route::post('/general-settings/update/all', 'Admin\GeneralSettingController@generalupdate')->name('admin-gs-update');
  Route::post('/general-settings/update/menu/all', 'Admin\GeneralSettingController@menuupdate')->name('admin-gs-menuupdate');
  //------------ ADMIN GENERAL SETTINGS SECTION ENDS ------------
  Route::get('/check/movescript', 'Admin\DashboardController@movescript')->name('admin-move-script');
  Route::get('/generate/backup', 'Admin\DashboardController@generate_bkup')->name('admin-generate-backup');
  Route::get('/activation', 'Admin\DashboardController@activation')->name('admin-activation-form');
  Route::post('/activation', 'Admin\DashboardController@activation_submit')->name('admin-activate-purchase');
  Route::get('/clear/backup', 'Admin\DashboardController@clear_bkup')->name('admin-clear-backup');
});

  //------------ ADMIN FAQ SECTION ------------

  Route::get('/faq/datatables', 'Admin\FaqController@datatables')->name('admin-faq-datatables'); //JSON REQUEST
  Route::get('/faq', 'Admin\FaqController@index')->name('admin-faq-index');
  Route::get('/faq/create', 'Admin\FaqController@create')->name('admin-faq-create');
  Route::post('/faq/create', 'Admin\FaqController@store')->name('admin-faq-store');
  Route::get('/faq/edit/{id}', 'Admin\FaqController@edit')->name('admin-faq-edit');
  Route::post('/faq/update/{id}', 'Admin\FaqController@update')->name('admin-faq-update');
  Route::get('/faq/delete/{id}', 'Admin\FaqController@destroy')->name('admin-faq-delete');

  //------------ ADMIN FAQ SECTION ENDS ------------


  //------------ ADMIN FEATURE SECTION ------------

  Route::get('/feature/datatables', 'Admin\FeatureController@datatables')->name('admin-feature-datatables'); //JSON REQUEST
  Route::get('/feature', 'Admin\FeatureController@index')->name('admin-feature-index');
  Route::get('/feature/create', 'Admin\FeatureController@create')->name('admin-feature-create');
  Route::post('/feature/create', 'Admin\FeatureController@store')->name('admin-feature-store');
  Route::get('/feature/edit/{id}', 'Admin\FeatureController@edit')->name('admin-feature-edit');
  Route::post('/feature/update/{id}', 'Admin\FeatureController@update')->name('admin-feature-update');
  Route::get('/feature/delete/{id}', 'Admin\FeatureController@destroy')->name('admin-feature-delete');

  //------------ ADMIN FEATURE SECTION ENDS ------------


  //------------ ADMIN PAGE SETTINGS SECTION ------------
// Page Setting Section



  Route::get('/page-settings/contact', 'Admin\PageSettingController@contact')->name('admin-ps-contact');
  Route::get('/page-settings/customize', 'Admin\PageSettingController@customize')->name('admin-ps-customize');
  Route::get('/page-settings/menu/customize', 'Admin\GeneralSettingController@customize')->name('admin-ps-menu-customize');
  Route::get('/page-settings/experience', 'Admin\PageSettingController@video')->name('admin-ps-video');
  Route::get('/page-settings/homecontact', 'Admin\PageSettingController@homecontact')->name('admin-ps-homecontact');
  Route::get('/page-settings/present', 'Admin\PageSettingController@present')->name('admin-ps-present');
  Route::get('/page-settings/blog', 'Admin\PageSettingController@blog')->name('admin-ps-blog');
  Route::post('/page-settings/update/all', 'Admin\PageSettingController@update')->name('admin-ps-update');
  Route::post('/page-settings/update/home', 'Admin\PageSettingController@homeupdate')->name('admin-ps-homeupdate');
  //------------ ADMIN PAGE SETTINGS SECTION ENDS ------------

  //------------ ADMIN PAGE SECTION ------------  

  Route::get('/page/datatables', 'Admin\PageController@datatables')->name('admin-page-datatables'); //JSON REQUEST
  Route::get('/page', 'Admin\PageController@index')->name('admin-page-index');
  Route::get('/page/create', 'Admin\PageController@create')->name('admin-page-create');
  Route::post('/page/create', 'Admin\PageController@store')->name('admin-page-store');
  Route::get('/page/edit/{id}', 'Admin\PageController@edit')->name('admin-page-edit');
  Route::post('/page/update/{id}', 'Admin\PageController@update')->name('admin-page-update');
  Route::get('/page/delete/{id}', 'Admin\PageController@destroy')->name('admin-page-delete');
  Route::get('/page/header/{id1}/{id2}', 'Admin\PageController@header')->name('admin-page-header');
  Route::get('/page/footer/{id1}/{id2}', 'Admin\PageController@footer')->name('admin-page-footer');

  //------------ ADMIN PAGE SECTION ENDS------------  

  Route::group(['middleware'=>'admininistrator'],function(){

  //------------ ADMIN EMAIL SETTINGS SECTION ------------

  Route::get('/email-templates/{id}', 'Admin\EmailController@edit')->name('admin-mail-edit');
  Route::post('/email-templates/{id}', 'Admin\EmailController@update')->name('admin-mail-update');
  Route::get('/email-config', 'Admin\EmailController@config')->name('admin-mail-config');
  Route::get('/groupemail', 'Admin\EmailController@groupemail')->name('admin-group-show');
  Route::post('/groupemailpost', 'Admin\EmailController@groupemailpost')->name('admin-group-submit');
  Route::get('/issmtp/{status}', 'Admin\GeneralSettingController@issmtp')->name('admin-gs-issmtp');

  //------------ ADMIN EMAIL SETTINGS SECTION ENDS ------------

  //------------ ADMIN PAYMENT SETTINGS SECTION ------------

// Payment Informations  

  Route::get('/payment-informations', 'Admin\GeneralSettingController@paymentsinfo')->name('admin-gs-payments');


// Currency Settings

  Route::get('/currency/datatables', 'Admin\CurrencyController@datatables')->name('admin-currency-datatables'); //JSON REQUEST
  Route::get('/currency', 'Admin\CurrencyController@index')->name('admin-currency-index');
  Route::get('/currency/create', 'Admin\CurrencyController@create')->name('admin-currency-create');
  Route::post('/currency/create', 'Admin\CurrencyController@store')->name('admin-currency-store');
  Route::get('/currency/edit/{id}', 'Admin\CurrencyController@edit')->name('admin-currency-edit');
  Route::post('/currency/update/{id}', 'Admin\CurrencyController@update')->name('admin-currency-update');
  Route::get('/currency/delete/{id}', 'Admin\CurrencyController@destroy')->name('admin-currency-delete');
  Route::get('/currency/status/{id1}/{id2}', 'Admin\CurrencyController@status')->name('admin-currency-status');

  //------------ ADMIN PAYMENT SETTINGS SECTION ENDS------------

  //------------ ADMIN SOCIAL SETTINGS SECTION ------------

  Route::get('/social', 'Admin\SocialSettingController@index')->name('admin-social-index');
  Route::post('/social/update', 'Admin\SocialSettingController@socialupdate')->name('admin-social-update');
  Route::post('/social/update/all', 'Admin\SocialSettingController@socialupdateall')->name('admin-social-update-all');


  //------------ ADMIN SOCIAL SETTINGS SECTION ENDS------------

  //------------ ADMIN LANGUAGE SETTINGS SECTION ------------

  Route::get('/languages/datatables', 'Admin\LanguageController@datatables')->name('admin-lang-datatables'); //JSON REQUEST
  Route::get('/languages', 'Admin\LanguageController@index')->name('admin-lang-index');
  Route::get('/languages/create', 'Admin\LanguageController@create')->name('admin-lang-create');
  Route::get('/languages/edit/{id}', 'Admin\LanguageController@edit')->name('admin-lang-edit');
  Route::post('/languages/create', 'Admin\LanguageController@store')->name('admin-lang-store');
  Route::post('/languages/edit/{id}', 'Admin\LanguageController@update')->name('admin-lang-update');
  Route::get('/languages/status/{id1}/{id2}', 'Admin\LanguageController@status')->name('admin-lang-st');
  Route::get('/languages/delete/{id}', 'Admin\LanguageController@destroy')->name('admin-lang-delete');

  //------------ ADMIN LANGUAGE SETTINGS SECTION ENDS ------------

  //------------ ADMIN SEOTOOL SETTINGS SECTION ------------

  Route::get('/seotools/analytics', 'Admin\SeoToolController@analytics')->name('admin-seotool-analytics');
  Route::post('/seotools/analytics/update', 'Admin\SeoToolController@analyticsupdate')->name('admin-seotool-analytics-update');
  Route::get('/seotools/keywords', 'Admin\SeoToolController@keywords')->name('admin-seotool-keywords');
  Route::post('/seotools/keywords/update', 'Admin\SeoToolController@keywordsupdate')->name('admin-seotool-keywords-update');
  Route::get('/products/popular/{id}','Admin\SeoToolController@popular')->name('admin-prod-popular');
  //------------ ADMIN SEOTOOL SETTINGS SECTION ------------

  //------------ STAFF SECTION ------------
  Route::get('/staff/datatables', 'Admin\StaffController@datatables')->name('admin-staff-datatables');
  Route::get('/staff', 'Admin\StaffController@index')->name('admin-staff-index');
  Route::get('/staff/create', 'Admin\StaffController@create')->name('admin-staff-create');
  Route::post('/staff/create', 'Admin\StaffController@store')->name('admin-staff-store');
  Route::get('/staff/edit/{id}', 'Admin\StaffController@show')->name('admin-staff-show'); 
  Route::get('/staff/delete/{id}', 'Admin\StaffController@destroy')->name('admin-staff-delete'); 

  //------------ STAFF SECTION ENDS------------


});
  //------------ ADMIN SUBSCRIBERS SECTION ------------

  Route::get('/subscribers/datatables', 'Admin\SubscriberController@datatables')->name('admin-subs-datatables'); //JSON REQUEST
  Route::get('/subscribers', 'Admin\SubscriberController@index')->name('admin-subs-index');
  Route::get('/subscribers/download', 'Admin\SubscriberController@download')->name('admin-subs-download');  

  //------------ ADMIN SUBSCRIBERS ENDS ------------

});
Route::post('the/genius/ocean/2441139', 'Front\FrontendController@subscription');
Route::get('finalize', 'Front\FrontendController@finalize');

// ************************************ ADMIN SECTION ENDS**********************************************

// ************************************ FRONT SECTION **********************************************

  Route::get('/', 'Front\FrontendController@index')->name('front.index');
  Route::get('/currency/{id}', 'Front\FrontendController@currency')->name('front.currency');
  Route::get('/language/{id}', 'Front\FrontendController@language')->name('front.language');

  Route::get('/services','Front\FrontendController@services')->name('front.services');
  Route::get('/plans','Front\FrontendController@plans')->name('front.plans');
  Route::get('/projects','Front\FrontendController@projects')->name('front.projects');
  Route::get('/teams','Front\FrontendController@teams')->name('front.teams');


  // BLOG SECTION
  Route::get('/blog','Front\FrontendController@blog')->name('front.blog');
  Route::get('/blog/{id}','Front\FrontendController@blogshow')->name('front.blogshow');
  Route::get('/blog/category/{slug}','Front\FrontendController@blogcategory')->name('front.blogcategory');
  Route::get('/blog/tag/{slug}','Front\FrontendController@blogtags')->name('front.blogtags');  
  Route::get('/blog-search','Front\FrontendController@blogsearch')->name('front.blogsearch');
  Route::get('/blog/archive/{slug}','Front\FrontendController@blogarchive')->name('front.blogarchive');
  // BLOG SECTION ENDS

  // FAQ SECTION  
  Route::get('/faq','Front\FrontendController@faq')->name('front.faq');
  // FAQ SECTION ENDS

  // CONTACT SECTION  
  Route::get('/contact','Front\FrontendController@contact')->name('front.contact');
  Route::post('/contact','Front\FrontendController@contactemail')->name('front.contact.submit');
  Route::get('/contact/refresh_code','Front\FrontendController@refresh_code');
  // CONTACT SECTION  ENDS

  // QUOTE SECTION  
  Route::post('/quote','Front\FrontendController@quote')->name('front.quote.submit');
  // QUOTE SECTION  ENDS



  // CHECKOUT SECTION  
  Route::get('/plan/{id}','Front\CheckoutController@checkout')->name('front.checkout');
  Route::get('/order/payment/return', 'Front\PaymentController@payreturn')->name('payment.return');
  Route::get('/order/payment/cancle', 'Front\PaymentController@paycancle')->name('payment.cancle');
  Route::post('/order/payment/notify', 'Front\PaymentController@notify')->name('payment.notify');

  Route::post('/paypal-submit', 'Front\PaymentController@store')->name('paypal.submit');
  Route::post('/stripe-submit', 'Front\StripeController@store')->name('stripe.submit');
  // CHECKOUT SECTION ENDS

  // SUBSCRIBE SECTION

  Route::post('/subscriber/store', 'Front\FrontendController@subscribe')->name('front.subscribe');

  // SUBSCRIBE SECTION ENDS
  

  // Molly Payment Section
  Route::post('/molly/payment','Front\MollyPaymentController@store')->name('payment.molly');
  Route::get('/molly/payment/notify','Front\MollyPaymentController@notify')->name('payment.molly.notify');
  // Molly Payment Section Ends

  // PROJECT SECTION  
  Route::get('/project/{id}','Front\FrontendController@project')->name('front.project');
  // PROJECT SECTION ENDS 

  // PROJECT SECTION  
  Route::get('/service/{slug}','Front\FrontendController@service')->name('front.service');
  // PROJECT SECTION ENDS 

  // PAGE SECTION
  Route::get('/{slug}','Front\FrontendController@page')->name('front.page');
  // PAGE SECTION ENDS
  
// ************************************ FRONT SECTION ENDS**********************************************