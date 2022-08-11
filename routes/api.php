<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::namespace('Api\Chats')->middleware('auth:api')->name('api.chats.')->group(base_path('routes/api/chats.php'));
Route::namespace('Api\EMR')->middleware('auth:api')->name('api.emr.')->group(base_path('routes/api/emr.php'));
Route::namespace('Api\Icms')->middleware('auth:api')->name('api.icms.')->group(base_path('routes/api/icms.php'));
Route::namespace('Api\Hrms')->middleware('auth:api')->name('api.hrms.')->group(base_path('routes/api/hrms.php'));
Route::namespace('Api\Lms')->middleware('auth:api')->name('api.lms.')->group(base_path('routes/api/lms.php'));
Route::namespace('Api\Som')->middleware('auth:api')->name('api.som.')->group(base_path('routes/api/som.php'));
Route::namespace('Api\Ticketing')->middleware('auth:api')->name('api.tickets.')->group(base_path('routes/api/ticket.php'));
Route::namespace('Api\Ums')->middleware('auth:api')->name('api.ums.')->group(base_path('routes/api/ums.php'));


Route::apiResources([
    'dashboard'     => 'Api\DashboardController',
    'member'        => 'Api\MemberController',
    'notices'       => 'Api\NoticeController',
    'policies'      => 'Api\PolicyController',
]);

Route::post('notices/modify',     'Api\NoticeController@modify')->name('api.notices.modify');
Route::get('policies/all/{id}',  'Api\PolicyController@all')->name('api.policies.all');
Route::post('policies/assign',   'Api\PolicyController@assign')->name('api.policies.assign');