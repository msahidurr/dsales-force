<?php 

Route::resource('divisions', 'DivisionController');
Route::resource('districts', 'DistrictController');
Route::resource('thanas', 'ThanaController');
Route::resource('banks', 'BankController');
Route::resource('branchs', 'BranchController');
Route::resource('nationalitys', 'NationalityController');
Route::resource('premiseOwnerships', 'PremiseOwnershipController');
Route::resource('userTypes', 'UserTypeController');

Route::get('thanas/getThanaByDivisionAndDistrictId','ThanaController@getThanas');
Route::any('get/division','ThanaController@showDivision');
Route::any('branchs/getBranch','BranchController@getBranch');


/** IFA management route all**/

Route::group(['middleware' => 'auth'], function () {
	Route::group(['middleware' => 'routeAccess'], function () {

		Route::get('submitted/application', [
				'as' => 'submitted_application_view',
				'uses' => 'ifa\SubmittedApplication@viewSubmittedList'
			]);

		Route::get('partially/completed/application', [
				'as' => 'partially_completed_application_view',
				'uses' => 'ifa\PartiallyCompleted@viewPartiallyCompleted'
			]);

		Route::get('applicant/details/{application_no?}', [
				'as' => 'application_details_view',
				'uses' => 'ifa\PartiallyCompleted@viewApplicationDetails'
			]);

		Route::get('application/in/progress', [
				'as' => 'application_in_progress_view',
				'uses' => 'ifa\ApplicationProgress@viewApplicationProgress'
			]);		

		Route::get('rejected/applications', [
				'as' => 'rejected_applications_view',
				'uses' => 'ifa\RejectedApplication@viewRejectedApplication'
			]);
		

		Route::get('update/training', [
				'as' => 'update_training_view',
				'uses' => 'ifa\UpdateTrainingController@viewUpdateTraining'
			]);

		Route::get('update/examination', [
				'as' => 'update_examination_view',
				'uses' => 'ifa\UpdateExamController@viewUpdateExam'
			]);

		Route::get('approved/application', [
				'as' => 'approved_application_view',
				'uses' => 'ifa\ApprovedApplication@viewApprovedApp'
			]);

		Route::get('ifa/active', [
				'as' => 'ifa_active_list_view',
				'uses' => 'ifa\Status\ActiveController@viewActive'
			]);

		Route::get('ifa/inactive', [
				'as' => 'ifa_inactive_list_view',
				'uses' => 'ifa\Status\InactiveController@viewInactive'
			]);

});

		/** Ajax route **/

		Route::get('ifa/management/all/value','ifa\PartiallyCompleted@getIfaAllValue');
		Route::get('/getMenuFilterValue','ifa\PartiallyCompleted@getIfaFilterValue');

	
});


/** LEAD route all**/

Route::group(['middleware' => 'auth'], function () {
	Route::group(['middleware' => 'routeAccess'], function () {

		Route::get('lead/unassigned', [
				'as' => 'unassigned_view',
				'uses' => 'Lead\UnassignedController@viewUnassigned'
			]);

		Route::get('lead/converted', [
				'as' => 'converted_view',
				'uses' => 'Lead\ConvertedController@viewConverted'
			]);

		Route::get('lead/highly/interested', [
				'as' => 'highly_interested_view',
				'uses' => 'Lead\HighlyInterestedController@viewHighlyInterested'
			]);

		Route::get('lead/might/invest', [
				'as' => 'might_invest_view',
				'uses' => 'Lead\MightInvestController@viewMightInvest'
			]);

		Route::get('lead/interested', [
				'as' => 'Interested_view',
				'uses' => 'Lead\InterestedController@viewInterested'
			]);

		/** Piteched route**/

		Route::get('lead/pitched', [
				'as' => 'pitched_view',
				'uses' => 'Lead\PitchedController@viewPitched'
			]);

		/** Convertion ratio route**/

		Route::get('lead/conversion/ratio', [
				'as' => 'conversion_ratio_view',
				'uses' => 'Lead\ConversionRatioController@viewConversionRatio'
			]);

		/** Bulk upload route**/

		Route::get('lead/bulk/upload', [
				'as' => 'bulk_upload_view',
				'uses' => 'Lead\BulkUploadController@bulkUploadView'
			]);

		Route::post('lead/store/bulk/upload', [
				'as' => 'store_bulk_upload',
				'uses' => 'Lead\BulkUploadController@storeBulk'
			]);

		/** Create Lead route**/

		Route::get('create/lead', [
				'as' => 'create_lead_view',
				'uses' => 'Lead\CreateLeadController@viewCreateLeadList'
			]);
		Route::get('add/lead', [
				'as' => 'add_lead_view',
				'uses' => 'Lead\CreateLeadController@addLeadview'
			]);

		Route::post('store/lead', [
				'as' => 'store_create_lead',
				'uses' => 'Lead\CreateLeadController@storeLead'
			]);

		Route::get('edit/lead/{id?}', [
				'as' => 'edit_create_lead',
				'uses' => 'Lead\CreateLeadController@editLeadView'
			]);

		Route::post('update/lead/{id?}', [
				'as' => 'update_create_lead',
				'uses' => 'Lead\CreateLeadController@updateLead'
			]);

		Route::get('view/lead/{id?}', [
				'as' => 'view_details_create_lead',
				'uses' => 'Lead\LeadDetailsView@detailsView'
			]);
});
		Route::get('/lead/list/Filter/Value','Lead\LeadSearchController@getLeadSearchValue');
		Route::get('/lead/list/all/value','Lead\LeadSearchController@getLeadAllValue');
		Route::get('/get/ifaRegistervalue','Lead\LeadSearchController@getIfaValue');
	
});


/** Salesforce Agent route all**/

Route::group(['middleware' => 'auth'], function () {
	Route::group(['middleware' => 'routeAccess'], function () {

		Route::get('sales/approved/application', [
				'as' => 'sales_approved_application_view',
				'uses' => 'SalesAgent\SalesApprovedApplication@viewSalesApprovedApp'
			]);

		Route::get('sales/active', [
				'as' => 'sales_active_list_view',
				'uses' => 'SalesAgent\Status\ActiveController@viewActive'
			]);

		Route::get('sales/inactive', [
				'as' => 'sales_inactive_list',
				'uses' => 'SalesAgent\Status\InactiveController@viewInactive'
			]);

		/** bulk upload route all**/

		Route::get('sales/bulk/upload', [
				'as' => 'sales_bulk_upload_view',
				'uses' => 'SalesAgent\BulkUploadController@bulkUploadView'
			]);

		Route::post('sales/bulk/uploadaction', [
				'as' => 'sales_bulk_upload_action',
				'uses' => 'SalesAgent\BulkUploadController@bulkUploadAction'
			]);

		Route::post('lead/bulk/uploadaction', [
				'as' => 'lead_bulk_upload_action',
				'uses' => 'SalesAgent\BulkUploadController@leadBulkUploadAction'
			]);

		Route::get('sales/store/bulk/upload', [
				'as' => 'sales_store_bulk_upload',
				'uses' => 'SalesAgent\BulkUploadController@storeBulk'
			]);
	});
});


/** Management Setting Agent route all**/

Route::group(['middleware' => 'auth'], function () {
	Route::group(['middleware' => 'routeAccess'], function () {

		/**Organization Route**/

		Route::get('organization', [
				'as' => 'organization_view',
				'uses' => 'ManagementSetting\NewOrganization@viewNewOrganization'
			]);
		Route::get('add/organization', [
				'as' => 'add_organization_view',
				'uses' => 'ManagementSetting\NewOrganization@addNewOrganization'
			]);
		Route::post('store/organization', [
				'as' => 'store_organization',
				'uses' => 'ManagementSetting\NewOrganization@storeOrganization'
			]);
		Route::get('edit/organization/{id?}', [
				'as' => 'edit_organization',
				'uses' => 'ManagementSetting\NewOrganization@editOrganization'
			]);
		Route::post('update/organization/{id?}', [
				'as' => 'update_organization',
				'uses' => 'ManagementSetting\NewOrganization@updateOrganization'
			]);

		/**Training name route**/

		Route::get('training/name', [
				'as' => 'new_training_name_view',
				'uses' => 'ManagementSetting\TrainingNameController@viewTrainingName'
			]);

		Route::get('add/new/training', [
				'as' => 'add_training_name_view',
				'uses' => 'ManagementSetting\TrainingNameController@addTraining'
			]);

		Route::post('store/training', [
				'as' => 'store_training_name',
				'uses' => 'ManagementSetting\TrainingNameController@storeTraining'
			]);
		Route::get('edit/training/{id?}', [
				'as' => 'edit_training_name',
				'uses' => 'ManagementSetting\TrainingNameController@editTraining'
			]);
		Route::post('update/training/{id?}', [
				'as' => 'update_training_name',
				'uses' => 'ManagementSetting\TrainingNameController@updateTraining'
			]);



		/** Exam schedule route**/

		Route::get('exam/schedule', [
				'as' => 'exam_schedule_view',
				'uses' => 'ManagementSetting\ExamSchedule@viewExamSchedule'
			]);

		/** New Rating Route**/

		Route::get('new/rating', [
				'as' => 'new_rating_view',
				'uses' => 'ManagementSetting\NewRatingController@viewNewRating'
			]);

		Route::get('add/new/rating', [
				'as' => 'add_rating_view',
				'uses' => 'ManagementSetting\NewRatingController@addRating'
			]);

		Route::post('store/rating', [
				'as' => 'store_new_rating',
				'uses' => 'ManagementSetting\NewRatingController@storeRating'
			]);
		Route::get('edit/rating/{id?}', [
				'as' => 'edit_new_rating',
				'uses' => 'ManagementSetting\NewRatingController@editRating'
			]);
		Route::post('update/rating/{id?}', [
				'as' => 'update_new_rating',
				'uses' => 'ManagementSetting\NewRatingController@updateRating'
			]);

		/** New occupation Route**/

		Route::get('new/occupation', [
				'as' => 'new_occupation_view',
				'uses' => 'ManagementSetting\NewOccupation@viewNewOccupationList'
			]);

		Route::get('add/new/occupation', [
				'as' => 'add_new_occupation_view',
				'uses' => 'ManagementSetting\NewOccupation@addNewOccupation'
			]);

		Route::post('store/occupation', [
				'as' => 'store_occupation',
				'uses' => 'ManagementSetting\NewOccupation@storeOccupation'
			]);
		Route::get('edit/occupation/{id?}', [
				'as' => 'edit_occupation',
				'uses' => 'ManagementSetting\NewOccupation@editOccupation'
			]);
		Route::post('update/occupation/{id?}', [
				'as' => 'update_occupation',
				'uses' => 'ManagementSetting\NewOccupation@updateOccupation'
			]);
	});
});