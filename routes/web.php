<?php

// namespace App\Http\Controllers\Admin;
namespace App\Http\Controller;
// use App\Http\Controllers\SearchController;

use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\CertificatesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Users\DashboardController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Users\Dashboard\UserDashboardController;
use App\Http\Controllers\Users\UserDashboardPapersController; 
use App\Http\Controllers\Users\UserDashboardProfileController; 
use App\Http\Controllers\Users\UserDashboardUploadCertificate;
use App\Http\Controllers\Users\UserDashboardSearchCertificate;





Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/dashboard/papers', [UserDashboardPapersController::class, 'index'])->name('dashboard.papers.index');

Route::get('/dashboard/profile', [UserDashboardProfileController::class, 'index'])->name('dashboard.profile');
Route::put('/dashboard/profile/update', [UserDashboardProfileController::class, 'update'])->middleware(['web','auth'])->name('dashboard.profile.update');


Route::prefix('user')->group(function () {
    Route::get('/papers', [UserDashboardPapersController::class, 'index'])->name('user.papers.index');
    Route::post('/papers/upload', [UserDashboardPapersController::class, 'upload'])->name('user.papers.upload');
    Route::post('/uploadcertificates/upload', [UserDashboardUploadCertificate::class, 'upload'])->middleware(['web','auth'])->name('user.uploadcertificates.upload');
    Route::get('/papers/{paper}/download', [UserDashboardPapersController::class, 'download'])->name('user.download.paper');
});
Route::post('/upload-csv', [CertificateController::class, 'uploadCsv'])->name('upload.csv');

// Route::redirect('/', '/login');

Route::get('/', function () {
    return view('index'); // Adjust 'welcome' to the name of your homepage view
})->name('homepage');


Route::middleware(["auth"])->group(function(){

    Route::get('/dashboard', function () {
        return view('users.UserDashboard'); // Adjust 'welcome' to the name of your homepage view
    })->name('Dashboard');
    
    Route::get('/profile', [UserDashboardController::class, 'profile'])->name('profile');
    Route::get('/papers', [UserDashboardController::class, 'papers'])->name('papers');
    Route::get('/UploadCertificate', [UserDashboardController::class, 'UploadCertificate'])->name('UploadCertificate');
    Route::get('/searchcertificate', [UserDashboardController::class, 'SearchCertificate'])->name('SearchCertificate');
});


Route::get('/about', function () {
    return view('about'); // Adjust 'welcome' to the name of your homepage view
})->name('aboutpage');

Route::get('/getInTouch', function () {
    return view('getInTouch'); // Adjust 'welcome' to the name of your homepage view
})->name('getInTouchpage');

// Route::get('/institution/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
Route::get('/dashboard', [UserDashboardController::class, 'index'])->middleware(['web','auth'])->name('user.dashboard'); 


Route::get('/registration', [RegistrationController::class, 'showRegistrationForm'])->name('registration.form');
Route::post('/register/employer', [RegistrationController::class, 'registerEmployer'])->name('register.employer');
Route::post('/register/institution', [RegistrationController::class, 'registerInstitution'])->name('register.institution');
Route::get('/registration', function () {
    return view('auth.registration'); // Adjust the path to match the location of your registration view
})->name('registrationpage');

// Route::get('/institutionRegistration', function () {
//     return view('institutionRegistration'); // Adjust 'welcome' to the name of your homepage view
// })->name('institutionRegistrationpage');

// Route::get('/employerRegistration', function () {
//     return view('employerRegistration'); // Adjust 'welcome' to the name of your homepage view
// })->name('employerRegistrationpage');

// Route::get('/', function () {
//     return view('welcome'); // Adjust 'welcome' to the name of your homepage view
// });

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::post('/employer-cerificate-search', [UserDashboardController::class, 'search'])->name('employer.search');
Route::post('/user-search-certificates', [UserDashboardSearchCertificate::class, 'search'])->name('user.search');
// Route::get('/search-certificates', [UserDashboardSearchCertificate::class, 'index'])->name('user-search-certificates.index');
Route::get('/search-certificates', [SearchController::class, 'index'])->name('search.index');
Route::post('/search-certificates', [SearchController::class, 'search'])->name('search');


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::post('roles/parse-csv-import', 'RolesController@parseCsvImport')->name('roles.parseCsvImport');
    Route::post('roles/process-csv-import', 'RolesController@processCsvImport')->name('roles.processCsvImport');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Content Category
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Content Tag
    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');
    Route::resource('content-tags', 'ContentTagController');

    // Content Page
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPageController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', 'ContentPageController');

    // Faq Category
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Question
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::resource('faq-questions', 'FaqQuestionController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Institutions
    Route::delete('institutions/destroy', 'InstitutionsController@massDestroy')->name('institutions.massDestroy');
    Route::post('institutions/media', 'InstitutionsController@storeMedia')->name('institutions.storeMedia');
    Route::post('institutions/ckmedia', 'InstitutionsController@storeCKEditorImages')->name('institutions.storeCKEditorImages');
    Route::post('institutions/parse-csv-import', 'InstitutionsController@parseCsvImport')->name('institutions.parseCsvImport');
    Route::post('institutions/process-csv-import', 'InstitutionsController@processCsvImport')->name('institutions.processCsvImport');
    Route::resource('institutions', 'InstitutionsController');

    // Papers
    Route::delete('papers/destroy', 'PapersController@massDestroy')->name('papers.massDestroy');
    Route::post('papers/media', 'PapersController@storeMedia')->name('papers.storeMedia');
    Route::post('papers/ckmedia', 'PapersController@storeCKEditorImages')->name('papers.storeCKEditorImages');
    Route::post('papers/parse-csv-import', 'PapersController@parseCsvImport')->name('papers.parseCsvImport');
    Route::post('papers/process-csv-import', 'PapersController@processCsvImport')->name('papers.processCsvImport');
    Route::resource('papers', 'PapersController');

    // Employers
    Route::delete('employers/destroy', 'EmployersController@massDestroy')->name('employers.massDestroy');
    Route::post('employers/parse-csv-import', 'EmployersController@parseCsvImport')->name('employers.parseCsvImport');
    Route::post('employers/process-csv-import', 'EmployersController@processCsvImport')->name('employers.processCsvImport');
    Route::resource('employers', 'EmployersController');

    // Uploads
    Route::delete('uploads/destroy', 'UploadsController@massDestroy')->name('uploads.massDestroy');
    Route::post('uploads/media', 'UploadsController@storeMedia')->name('uploads.storeMedia');
    Route::post('uploads/ckmedia', 'UploadsController@storeCKEditorImages')->name('uploads.storeCKEditorImages');
    Route::post('uploads/parse-csv-import', 'UploadsController@parseCsvImport')->name('uploads.parseCsvImport');
    Route::post('uploads/process-csv-import', 'UploadsController@processCsvImport')->name('uploads.processCsvImport');
    Route::resource('uploads', 'UploadsController');

    // Complaints
    Route::delete('complaints/destroy', 'ComplaintsController@massDestroy')->name('complaints.massDestroy');
    Route::resource('complaints', 'ComplaintsController');

    // Chat
    Route::delete('chats/destroy', 'ChatController@massDestroy')->name('chats.massDestroy');
    Route::resource('chats', 'ChatController');

    // Traction
    Route::delete('tractions/destroy', 'TractionController@massDestroy')->name('tractions.massDestroy');
    Route::resource('tractions', 'TractionController');

    // Analytics
    Route::delete('analytics/destroy', 'AnalyticsController@massDestroy')->name('analytics.massDestroy');
    Route::resource('analytics', 'AnalyticsController');

    // Search
    Route::delete('searches/destroy', 'SearchController@massDestroy')->name('searches.massDestroy');
    Route::resource('searches', 'SearchController');

    // Certificates
    Route::delete('certificates/destroy', 'CertificatesController@massDestroy')->name('certificates.massDestroy');
    Route::post('certificates/media', 'CertificatesController@storeMedia')->name('certificates.storeMedia');
    Route::post('certificates/ckmedia', 'CertificatesController@storeCKEditorImages')->name('certificates.storeCKEditorImages');
    Route::post('certificates/parse-csv-import', 'CertificatesController@parseCsvImport')->name('certificates.parseCsvImport');
    Route::post('certificates/process-csv-import', 'CertificatesController@processCsvImport')->name('certificates.processCsvImport');
    Route::resource('certificates', 'CertificatesController');

    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/two-factor', 'ChangePasswordController@toggleTwoFactor')->name('password.toggleTwoFactor');
    }
});
Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});
