<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'AdminController@index');
    Route::get('/rsvps', 'AdminController@rsvps');
    Route::get('/rsvps/{id}', 'AdminController@rsvpInfo');

    Route::get('/attendees', 'AdminController@attendees');
    Route::get('/attendees/{id}', 'AdminController@attendeesInfo');

    Route::get('/meals', 'AdminController@food');
    Route::get('meals/count', 'AdminController@foodCount');
    Route::get('meals/raw', 'AdminController@foodRaw');

    Route::get('/sms', 'MessagingController@smsDashboard');
    Route::get('/email', 'MessagingController@emailDashboard');

    Route::post('/sms/quick', 'MessagingController@smsQuick');
    Route::post('/email/quick', 'MessagingController@emailQuick');
    Route::post('/email', 'MessagingController@email');
    Route::post('/sms', 'MessagingController@sms');

    Route::get('/bbq', 'AdminController@bbqList');
    Route::get('/bbq/send', 'BbqController@sendBbqInvites');
    //Route::get('/bbq/send/sms', 'BbqController@sendBbqSms');

    Route::get('/verify','AdminController@verify');

    Route::get('/search', 'AdminController@search');
});

Route::get('/', 'PagesController@index');
Route::get('/info', 'PagesController@info');
Route::get('/tucson', 'PagesController@tucson');
Route::get('/photos', 'PagesController@photos');
Route::get('/registry', 'PagesController@registry');
Route::get('/story', 'PagesController@story');

Route::get('/rsvp', 'RsvpController@index');
Route::get('/rsvp/recover', 'RsvpController@recover');
Route::post('/rsvp/recover', 'RsvpController@resendRsvpEmail');

Route::post('/rsvp', 'RsvpController@store');
Route::get('/rsvp/{id}/edit/{key}', 'RsvpController@edit');
Route::post('/rsvp/{id}/edit/{key}', 'RsvpController@update');

Route::get('/bbq', 'BbqController@index');
Route::get('/bbq/rsvp', 'BbqController@rsvpAuth');
Route::post('/bbq/rsvp', 'BbqController@rsvpAuthPost');
Route::get('/bbq/rsvp/{email}', 'BbqController@rsvpByEmail');
Route::post('/bbq/rsvp/{email}', 'BbqController@rsvpSelectPost');

Route::get('/rehearsal', 'PagesController@rehearsal');


