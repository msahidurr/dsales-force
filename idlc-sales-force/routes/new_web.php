<?php
/**
 * Created by PhpStorm.
 * User: tapumandal
 * Date: 7/28/18
 * Time: 1:20 PM
 */

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'routeAccess'], function () {

        Route::get('route/checking', function(){
            return 'Route checking complete and success';
        });


        /** Training schedule route**/

        Route::get('training/schedule/list', 'ManagementSetting\TrainingSchedule@viewTrainingSche')->name('training_schedule_view');
        Route::get('training/schedule/create', 'ManagementSetting\TrainingSchedule@trainingScheduleCreateView')->name('create_training_schedule_view');

        Route::post('training/schedule/create', 'ManagementSetting\TrainingSchedule@trainingScheduleCreateAction')->name('create_training_schedule_action');
        Route::get('training/schedule/{schedule_id?}/update', 'ManagementSetting\TrainingSchedule@trainingScheduleUpdateView')->name('update_training_schedule_view');
        Route::post('training/schedule/{schedule_id?}/update', 'ManagementSetting\TrainingSchedule@trainingScheduleUpdateAction')->name('update_training_schedule_action');

        Route::get('schedule/{schedule_id?}/trainee', 'ManagementSetting\ApplicantTrainingManagement@scheduleTraineeView')->name('schedule_trainee_view');
        Route::get('schedule/{schedule_id?}/trainee/add', 'ManagementSetting\ApplicantTrainingManagement@scheduleTraineeAddView')->name('schedule_trainee_add_view');
        Route::post('schedule/{schedule_id?}/trainee/add', 'ManagementSetting\ApplicantTrainingManagement@scheduleTraineeAddAction')->name('schedule_trainee_add_action');

        Route::get('schedule/{schedule_id?}/trainee/{application_no}/remove', 'ManagementSetting\ApplicantTrainingManagement@traineeRemove')->name('trainee_remove_action');
        // Data Only
        

        Route::post('schedule/{schedule_id?}/trainee/status', 'ManagementSetting\ApplicantTrainingManagement@trainingStatus')->name('change_trainee_training_status_action');


        Route::get('exam/schedule/create', 'ManagementSetting\ExamSchedule@scheduleCreateForm')->name('exam_schedule_create_view');
        Route::post('exam/schedule/create', 'ManagementSetting\ExamSchedule@scheduleCreate')->name('exam_schedule_create_action');

        Route::get('exam/schedule/{schedule_id?}/update', 'ManagementSetting\ExamSchedule@examScheduleUpdateView')->name('update_exam_schedule_view');
        Route::post('exam/schedule/{schedule_id?}/update', 'ManagementSetting\ExamSchedule@examScheduleUpdateAction')->name('update_exam_schedule_action');

        Route::get('exam_schedule/{exam_schedule_id?}/exameen', 'ManagementSetting\ExameenManagement@scheduleExameenView')->name('schedule_exameen_view');
        Route::get('exam_schedule/{exam_schedule_id?}/exameen/{application_no}/remove', 'ManagementSetting\ExameenManagement@exameenRemove')->name('exameen_remove_action');

        Route::get('exam_schedule/{schedule_id?}/exameen/update', 'ManagementSetting\ExameenManagement@scheduleExameenUpdateView')->name('schedule_exameen_update_view');
        Route::post('exam_schedule/{schedule_id?}/exameen/update', 'ManagementSetting\ExameenManagement@scheduleExameenUpdateAction')->name('schedule_exameen_update_action');

        Route::post('exam_schedule/{schedule_id?}/exam/status', 'ManagementSetting\ExameenManagement@examStatus')->name('change_exameen_exam_status_action');
        



        //Application Details nid validation
        Route::get('applicant/{application_no?}/nid/validate/{status?}', [
            'as' => 'applicant_nid_validate_action',
            'uses' => 'ifa\PartiallyCompleted@nidVaidate'
        ]);


        //Create Exam name

        Route::get('exam/name/list',[
            'as' => 'exam_name_list',
            'uses' => 'ManagementSetting\ExamNameController@index'
        ]);

        Route::get('exam/name/create',[
            'as' => 'exam_name_create',
            'uses' => 'ManagementSetting\ExamNameController@addExamName'
        ]);

        Route::post('exam/name/create',[
            'as' => 'exam_name_create_action',
            'uses' => 'ManagementSetting\ExamNameController@storeExamName'
        ]);

        Route::get('exam/name/edit/{id?}',[
            'as' => 'exam_name_edit_view',
            'uses' => 'ManagementSetting\ExamNameController@editExamName'
        ]);

        Route::post('exam/name/update/{id?}',[
            'as' => 'exam_name_update_action',
            'uses' => 'ManagementSetting\ExamNameController@updateExamName'
        ]);
    });
	
Route::get('schedule/{schedule_id?}/trainee/request', 'ManagementSetting\ApplicantTrainingManagement@scheduledPassTraineeList')->name('scheduled_trainee-list_only_view');
});


// INSERT INTO `mxp_menu` (`menu_id`, `name`, `route_name`, `description`, `parent_id`, `is_active`, `order_id`, `created_at`, `updated_at`) VALUES
// (105, 'Exam name', 'exam_name_list', 'Exam name List', 96, 1, 4, NULL, NULL),
// (106, 'Exam name Create View', 'exam_name_create', 'Exam name Create View', 0, 1, 0, NULL, NULL),
// (107, 'EXAM NAME CREATE ACTION', 'exam_name_create_action', 'EXAM NAME CREATE ACTION', 0, 1, 0 , NULL, NULL),
// (108, 'Exam name Edit View', 'exam_name_update', 'Exam name Edit View', 0, 1, 0, NULL, NULL),
// (109, 'EXAM NAME EDIT ACTION', 'exam_name_update_action', 'EXAM NAME EDIT ACTION form', 0, 1, 0, NULL, NULL);