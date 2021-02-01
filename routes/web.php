<?php

// Home Page
Route::group(["namespace"=>"home"],function(){
	Route::get('/', "indexController@index")->name('home');
	//contact
	Route::get('/contact', "indexController@contactUs")->name('contactUs');
	Route::post('/sendMessage', "indexController@sendMessage")->name('sendMessage');
	//assistance
	Route::get('/assistance', "indexController@assistance")->name('assistance');
	//course
	Route::get('/course/{id}', "courseController@index")->name('course');
	//ebooks
	Route::get('/ebooks', "ebookController@ebooks")->name('ebooks');
	Route::get('/ebooks-bundles', "ebookController@ebooksBundles")->name('ebooksBundles');
	Route::get('/trending-ebooks', "ebookController@trendingEbooks")->name('trendingEbooks');
	//cart
	Route::get('/cart', "cartController@cart");
	Route::get('/add-cart-item','cartController@addCartItem')->name('cart.add');
	Route::post('/add-cart-items','cartController@addCartEbooks')->name('cart.add.ebooks');
	Route::post('/delete-cart-item','cartController@deleteCartItem')->name('cart.delete');
	
});

Route::post('setSession','user\checkoutController@setSession');
Route::post('checkDeal','user\checkoutController@checkDeal');
Route::get('assistance-directory', function(){
	return view('home.pages.assistance');
});
Route::get('/order-placed', "paymentController@orderPlaced");

Route::get('linkedin/callback', "shareController@linkedinShare");
Route::get('save/course', "shareController@saveCourse");
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
	Route::resource('ebooks', 'ebookController');
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

// Route::get('certificateEmail', function(){
// 	return view('user.pages.certificateEmail-template');
// });

Route::post('subscribe', 'subscribeController@storeEmail')->name('subscribe');

// USER
Route::group(["namespace"=>"user","prefix"=>"user","middleware"=> 'auth'],function(){
	//PAYPALL
	Route::get('checkout/payment', 'PayPalController@payment')->name('checkout.payment');
	// Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
	// Route::get('payment/success', 'PayPalController@success')->name('payment.success');
	//SHARE CERTIFICATE VIA EMAIL
	Route::post('save-certificate', "shareCertificateController@saveImage")->name('save.certificate.image');
	Route::post('create-certificate-email', "shareCertificateController@createCertificate")->name('create.certificate.email');
	Route::post('share-certificate-email', "shareCertificateController@shareCertificate")->name('share.certificate.email');
	//CHANGE NAME WITH PAYPAL
	Route::get('payment', 'changeNameWithPayment@payment')->name('change-name-payment');
	Route::get('cancel', 'changeNameWithPayment@cancel')->name('payment.cancel');
	Route::get('payment/success', 'changeNameWithPayment@success')->name('payment.success');
	// COURSES
	Route::get('courses', "courseController@courses");
	Route::get('course-details/{id}', "courseController@courseDetails");
	Route::post('mark-complete', "courseController@markComplete");
	Route::post('log-course-complete', "courseController@logCourseComplete");
	//CHECKOUT
	Route::get('checkout', "checkoutController@index");

	// Route::get('change-name-checkout', "checkoutController@changeName");
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
	Route::get('setting', "settingController@setting")->name('user.setting');
	Route::post('profile-update', "settingController@updateProfile")->name('profile.update');
	Route::post('profile-update-image', "settingController@updateProfileImage")->name('profile.update.image');

	Route::post('updateEmail', "settingController@updateEmail")->name('profile.updateEmail');
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

	Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('user.password.email');
	  Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('user.password.request');
	  Route::post('/password/reset', 'ResetPasswordController@reset')->name('user.password.update');
	  Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('user.password.reset');

	Route::get('/signup', "LoginController@signupView");
	Route::post('/register-user', "LoginController@registerUser");
	Route::post('/login', "LoginController@login");
	Route::get('/login','LoginController@loginView');
	Route::post('/logout', "LoginController@logout")->name("logout");
});