<?php

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
Route::post('receive-sms-status', 'BroadcastsmsReportController@smsReport')->name('receivesmsstatus');
Route::post('receive-lead-sms', 'SmsSendTwilioController@receiveSms');
Route::get('receiveSmsTest', 'SmsSendTwilioController@receiveSmsTest');
Auth::routes();

Route::group(['middleware' => ['auth']], function() {
Route::get('/',  'MemberstypeController@membersTypeData');
Route::get('add-time', function () {return view('backend.add_time');})->name('add_time_form');
Route::get('update-time/{namaz_id}', 'MosqueController@getNamazTime')->name('updae-time');
Route::get('delete-mosque-data/{mosque_id}', 'MosqueController@deleteMosqueData')->name('delete-mosque-data');

Route::post('Add-Mosque', 'MosqueController@saveMosque')->name('add_mosque');
Route::get('Mosque', 'MosqueController@mosqueRecord')->name('mosque_record');
Route::post('save-namaz-time', 'MosqueController@saveNamazTime');
Route::post('Copy-Mosque', 'MosqueController@copyMosque')->name('copy_mosque');


Route::get('add-event', 'EventController@eventAdd')->name('add_event_form');
Route::post('save-event-time', 'EventController@saveEventTime');
Route::get('Events', 'EventController@eventsRecord')->name('events_record');
Route::get('updae-event-time/{event_id}', 'EventController@getEventTime')->name('updae-event-time');
Route::get('delete-event-data/{event_id}', 'EventController@deleteEventData')->name('delete-event-data');


Route::get('addvertisement', 'AddsController@smsTemplate')->name('adds-data');
Route::get('Add-New-Addvertisement-Template', 'AddsController@addNewAddsTemlate')->name('addNewAddsTemlate');
Route::post('Save-Addvertisement-Template', 'AddsController@saveNewAddsTemlate')->name('adds_tempalte_update');
Route::get('Edit-Addvertisement-Template/{template_id}', 'AddsController@editTemplateData')->name('edit-template-data');
Route::get('Delete-Addvertisement-Template/{template_id}', 'AddsController@deletTemplateData')->name('delete-template-data');


Route::get('subscriber', 'SubscribeUserController@subscriberRecod')->name('subscriber-data');
Route::get('subscribe-user', 'SubscribeUserController@index')->name('subscribe_user');
Route::post('subscribe-user', 'SubscribeUserController@saveSubscriber')->name('save_subscriber');
Route::get('delete-subscriber-data/{user_id}', 'SubscribeUserController@deleteSubscriber')->name('delete-subscriber-data');

Route::get('sms-template', 'SmsSendController@smsTemplate')->name('sms_template');
Route::get('event-sms-template', 'SmsSendController@eventsmsTemplate')->name('event_sms_template');
Route::post('sms-template-update', 'SmsSendController@updateTemplate')->name('tempalte_update');


Route::get('event-send-sms', 'SmsSendController@eventSMS')->name('event_send_sms');
Route::get('event-sms-sending', 'SmsSendController@eventSmsSending')->name('event_sending_sms');

Route::get('send-sms', 'SmsSendController@index')->name('send_sms');
Route::get('bulk-sms-send', 'SmsSendController@bulkSms')->name('bulk_sms_page');
Route::post('bulk-sms-sending', 'SmsSendController@bulkSmsSending')->name('bulk_sms_send');
Route::get('sms-sending', 'SmsSendController@smsSending')->name('sending_sms');
//Route::post('receive-sms', 'SmsSendController@receiveSms');



Route::get('Members-Category', 'MemberstypeController@membersTypeData')->name('members-type-data');
Route::get('Add-Members-Category', 'MemberstypeController@registerForm')->name('addMemberstype');
Route::get('delete-memberstype/{memberstype_id}', 'MemberstypeController@deletMembertype')->name('delete-memberstype-data');
Route::post('Save-Members-Type', 'MemberstypeController@register')->name('save_memberstype');

Route::get('members-data', 'MembersController@membersData')->name('members-data');
Route::get('Add-Member', 'MembersController@registerForm')->name('addMember');
Route::get('delete-member/{member_id}', 'MembersController@deletMember')->name('delete-member-data');
Route::post('Save-Member', 'MembersController@register')->name('save_member');

Route::get('memberstype/{membertype_id}', 'MembersController@membersType')->name('memberstype-data');


Route::get('excel-members-data', 'MembersController@excellMembersData')->name('excel-members-data');
Route::get('Add-Member-by-Excel', 'MembersController@ExcelForm')->name('addMemberbyExcel');
Route::post('Save-Member-by-Excel', 'ExcelReadController@excelReader')->name('save_member_by_excell');
Route::get('delete-member-data-excel/{member_id}', 'MembersController@deletMemberExcel')->name('delete-member-data-excel');


Route::get('bulk-sms-sending', 'MembersController@smsPage')->name('bulkmessages');
Route::post('Sms-send', 'SmsSendTwilioController@smsBulkSend')->name('smsBulkSend');
Route::get('Single-sms-sending', 'MembersController@smsSinglePage')->name('singlemessages');
Route::post('Indvidual-Sms-send', 'SmsSendTwilioController@smssingleSend')->name('singleBulkSend');


Route::get('click-to-call', 'MembersController@clicktocall')->name('clicktocall');
Route::post('call-created', 'TwilioController@createcall')->name('createcall');

Route::get('browser-to-phone', 'MembersController@browserCall')->name('browsercall');


Route::get('users', 'UsersController@usersData')->name('users-data');
Route::get('Add-New-User', 'UsersController@registerForm')->name('addNewUser');
Route::post('Save-Users', 'UsersController@register')->name('register_user');
Route::get('Delete-User/{user_id}', 'UsersController@deletUser')->name('delete-user-data');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('excel-read', 'ExcelReadController@excelReader');


Route::get('schedule-sms', 'ScheduleSmsController@showSchedule')->name('schedule_sms');
Route::get('add-schedule-sms', 'ScheduleSmsController@addScheduleSms')->name('addScheduleSms');
Route::get('delete-schedule/{schedule_id}', 'ScheduleSmsController@deletSchedule')->name('delete-schedule');
Route::post('save-schedule-sms', 'ScheduleSmsController@saveScheduleSms')->name('saveScheduleSms');

Route::get('scheduleSMSDailySnding', 'ScheduleSmsController@scheduleSMSDailySnding')->name('scheduleSMSDailySnding');
Route::get('scheduleSMSWeeklySnding', 'ScheduleSmsController@scheduleSMSWeeklySnding')->name('scheduleSMSWeeklySnding');
Route::get('scheduleSMSMonthlySnding', 'ScheduleSmsController@scheduleSMSMonthlySnding')->name('scheduleSMSMonthlySnding');
Route::get('scheduleSMSOnceSnding', 'ScheduleSmsController@scheduleSMSOnceSnding')->name('scheduleSMSOnceSnding');


Route::get('leads-management', 'LeadsController@index')->name('leadsmanagement');
Route::get('add-lead', 'LeadsController@addLead')->name('add_lead');
Route::post('save-lead', 'LeadsController@saveLead')->name('saveLead');
Route::get('delete-lead-data/{lead_id}', 'LeadsController@deleteLead')->name('delete-lead-data');
Route::get('leads-Question-detail/{lead_id}', 'LeadsController@leadsQuestiondata')->name('leadsQuestiondata');
Route::get('delete-question/{question_id}', 'LeadsController@deleteQuestion')->name('delete-question');

Route::get('leads-campaign', 'LeadsController@leadsCampaign')->name('leadscampaign');
Route::post('leads-sms-sending', 'SmsSendTwilioController@leadsSms')->name('leadsmsmsend');

Route::get('receive-sms-data', 'SmsSendTwilioController@receiveSmsData')->name('receivesmsdata');
Route::get('receive-sms-reply/{reply_sms_id}', 'SmsSendTwilioController@reply_sms')->name('replysms');
Route::get('delete-number/{phone}/{sms_id}', 'MembersController@deleteMemberStop')->name('deletenumber');


Route::get('snchronize-twilio-number', 'TwilionumberController@twilioNumber')->name('snchronizetwilionumber');

});