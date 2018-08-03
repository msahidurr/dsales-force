<?php

Route::get('/ifa-registration-form/{application_no?}/{step?}', 'IFARegistrationController@create')->name('ifa_registration.create');
Route::post('/ifa-registration-form/{application_no?}/{step?}', 'IFARegistrationController@store')->name('ifa_registration.store');
