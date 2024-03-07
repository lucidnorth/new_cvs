<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Institutions
    Route::post('institutions/media', 'InstitutionsApiController@storeMedia')->name('institutions.storeMedia');
    Route::apiResource('institutions', 'InstitutionsApiController');

    // Papers
    Route::post('papers/media', 'PapersApiController@storeMedia')->name('papers.storeMedia');
    Route::apiResource('papers', 'PapersApiController');

    // Employers
    Route::apiResource('employers', 'EmployersApiController');

    // Uploads
    Route::post('uploads/media', 'UploadsApiController@storeMedia')->name('uploads.storeMedia');
    Route::apiResource('uploads', 'UploadsApiController');

    // Certificates
    Route::post('certificates/media', 'CertificatesApiController@storeMedia')->name('certificates.storeMedia');
    Route::apiResource('certificates', 'CertificatesApiController');
});
