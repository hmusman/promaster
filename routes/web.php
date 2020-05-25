<?php

// Home Page
Route::group(["namespace"=>"home"],function(){
	Route::get('/', "indexController@index")->name('home');
	//contact
	Route::get('/contact', "indexController@contactUs")->name('contactUs');
	//assistance
	Route::get('/assistance', "indexController@assistance")->name('assistance');
	//course
	Route::get('/course/{id}', "courseController@index")->name('course');
	//ebooks
	Route::get('/ebooks', "ebookController@ebooks")->name('ebooks');
	Route::get('/trending-ebooks', "ebookController@trendingEbooks")->name('trendingEbooks');
	//cart
	Route::get('/cart', "cartController@cart");
	Route::post('/add-cart-item','cartController@addCartItem')->name('cart.add');
	Route::post('/delete-cart-item','cartController@deleteCartItem')->name('cart.delete');
	
});
Route::get('/order-placed', "paymentController@orderPlaced");
// ADMIN
Route::group(["namespace"=>"admin","prefix"=>"admin","middleware"=> 'auth:admin'],function(){

	// DASHBOARD
	Route::get('/', "indexController@index");
	Route::get('view-user-log/{id}','indexController@logs');
	//MAKE FEATURE DEAL
	Route::post('make-feature','dealsController@makeFeature');
	
	//DEALS
    Route::get('deals', "dealsController@index")->name('admin/deals');
    Route::get('add-deals', "dealsController@addDeals");
    Route::post('storeDeal', "dealsController@storeDeal");
    Route::get('dealEdit/{id}', "dealsController@dealEdit");
    Route::post('dealUpdate/{id}', "dealsController@dealUpdate");
    Route::post('dealDelete/{id}', "dealsController@dealDelete");
	// COURSE
	Route::resource('courses', 'courseController');
    //REPORT
    Route::get('report-problem', "reportController@index");
    Route::get('report-problem/{id}', "reportController@singleReport");
    Route::get('report/pending', "reportController@pending");
    Route::get('report/solved', "reportController@solved");
	Route::get('problem-status-change/{id}', "reportController@changeReportStatus")->name('problem.status');
	Route::get('markAsRead', function(){
		auth()->user()->unreadNotifications->markAsRead();
		return redirect()->back();
	})->name('markRead');
// 	Route::get('problem-delete/{id}', "reportController@deleteProblem")->name('problem.delete');
    //REVIEWS 	
	Route::get('reviews', "reviewController@index");
	Route::get('reviews/{id}', "reviewController@reviews");
	Route::get('users', "indexController@users");
	
});

Route::group(["namespace"=>"admin\Auth"],function(){
	Route::get('/admin/login', "LoginController@showLoginForm")->name('admin.login');
	Route::post('/admin/login', "LoginController@login")->name('admin.login');
	Route::post('/admin/logout', "LoginController@logout")->name('admin.logout');
	Route::get('/admin-password-request', "ForgotPasswordController@showLinkRequestForm")->name('admin.password.request');
	Route::post('/admin-reset-password-link', "ForgotPasswordController@sendResetLinkEmail")
	->name('admin.password.email');
	Route::get('/admin-reset-password', "ResetPasswordController@showResetForm")->name('admin.password.reset');
	Route::post('/admin-reset-password', "ResetPasswordController@reset")->name('admin.password.update');
});





// USER
Route::group(["namespace"=>"user","prefix"=>"user","middleware"=> 'auth'],function(){
	//PAYPALL
	Route::get('payment', 'PayPalController@payment')->name('payment');
	Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
	Route::get('payment/success', 'PayPalController@success')->name('payment.success');
	// COURSES
	Route::get('courses', "courseController@courses");
	Route::get('course-details/{id}', "courseController@courseDetails");
	Route::post('mark-complete', "courseController@markComplete");
	Route::post('log-course-complete', "courseController@logCourseComplete");
	//CHECKOUT
	Route::get('checkout', "checkoutController@index");
	// DEALS and GUIDE
	Route::get('deals', "dealsController@index");
	Route::get('pro-deals', "dealsController@proDeals");
	// EBOOKS
	Route::get('ebooks', "courseController@ebooks");
	Route::post('download', "courseController@download");
	// CERTIFICATES
	Route::get('certificates', "courseController@certificates");
	Route::post('download-certificate', "courseController@downloadCertificate");
	// SETTING
	Route::get('setting', "settingController@setting");
	Route::post('profile-update', "settingController@updateProfile")->name('profile.update');
	Route::post('reset-password', "settingController@resetPassword")->name('password.reset');
    //REPORT PROBLEM
    Route::get('report-problem', "reportController@index");
    Route::get('report-problem/{id}', "reportController@singleReport");
	Route::post('report-problem', "reportController@store");
	Route::get('report/solved', "reportController@solved");
	Route::get('report/pending', "reportController@pending");
	Route::get('markAsRead', function(){
		auth()->user()->unreadNotifications->markAsRead();
		return redirect()->back();
	})->name('usermarkRead');

	// REVIEWS
	Route::get('reviews', "reviewController@index");
	Route::get('review-history', "reviewController@reviewHistory");
	Route::post('create-review', "reviewController@createReview");
});
// Auth::routes(['verify' => true]);
Route::group(["namespace"=>"user\auth"],function(){
	Route::get('/reset-verification-link', "VerificationController@resend")->name('resend');
	Route::get('/verify-verification-link', "VerificationController@verify")->name('verification');
	Route::post('/reset-password-link', "ForgotPasswordController@sendResetLinkEmail")->name('reset-link');
	Route::get('/reset-password', "ResetPasswordController@showResetForm")->name('show-reset-form');
	Route::post('/reset-password', "ResetPasswordController@reset")->name('password-update');

	Route::get('/signup', "LoginController@signupView");
	Route::post('/register-user', "LoginController@registerUser");
	Route::post('/login', "LoginController@login");
	Route::get('/login','LoginController@loginView');
	Route::post('/logout', "LoginController@logout")->name("logout");
});