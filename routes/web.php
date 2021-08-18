<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group that
| contains the "web" middleware group. Now create something great!
|
 */
//  Frontend

// Tutor
// Route::group(['middleware'=>['assign.guard:tutor,login']],function(){

// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('messanger', 'HomeController@messanger');
// Searching
Route::any('/search', 'SearchController@search');
Route::any('/find/tutor/filter', 'SearchController@filterTutor');
Route::any('/search/find/tutoring', 'SearchController@searchTutor');
Route::post('autocomplete/fatch', 'Backend\SuggesionManageController@autocompleteFetch')->name('autocomplete.fetch');
Route::get('iframe', function () {
    return view('frontend.screenshare');
});
Route::post('find/checkbox/serach/{id}', 'SearchController@checkboxSearch');
Route::post('paypal', 'PaymentController@payWithpaypal');

Route::group(['namespace' => 'Frontend'], function () {

    Route::get('/', 'HomepageController@index');
    Route::get('/help', 'HomepageController@help');
    Route::get('/courses/{id}', 'HomepageController@courseId');
    Route::get('/school-program/{id}', 'HomepageController@schoolProgramCourse');
    Route::get('/language-course/{id}', 'HomepageController@schoolProgramCourse');
    Route::get('/test-video', 'HomepageController@testVideo');

    Route::get('/course', 'HomepageController@course');
    Route::get('ict/courses', 'HomepageController@ictCourses');
    Route::get('languages/courses', 'HomepageController@languagesCourses');
    Route::get('professinal/courses', 'HomepageController@professinalCourses');
    //  Page
    Route::get('/live-class', 'HomepageController@liveClass');

    Route::post('message', 'HomepageController@sendMessage');

    Route::any('/search', 'HomepageController@search');
    Route::any('/course-search', 'HomepageController@searchCourseSchool');
    Route::any('/pro-course-search', 'HomepageController@searchProCourse');

    // Select Course Category
    Route::get('user-course-category/{id}', 'HomepageController@userCourseCategory');
    Route::post('selected-user-course-store', 'HomepageController@selectedUserCourseStore')->name('selected.user.course.store');
    Route::get('student-course-category/{id}', 'HomepageController@studentCourseCategory');
    // Route::get('student-list/{id}', 'HomepageController@studentList');

    

    // Test Course 
    Route::get('show-students', 'HomepageController@showStudents');




    // Mashtor Alumni
    Route::get('mashtor-alumni', 'HomepageController@showMashtor');




    Route::get('teacher/find-tutor', 'Teacher\TeacherController@findTutor');
    Route::get('teacher/tutor-details/{id}', 'Teacher\TeacherController@tutorDetails');
    Route::get('/metarials-details/{id}', 'HomepageController@metarialsDetails');
    Route::get('/presentation', 'HomepageController@presentation');
    Route::get('/profile', 'ProfileController@index');
    Route::post('/profile/update/{id}', 'ProfileController@update');
    Route::get('/profile/account', 'ProfileController@account');
    Route::post('profile/change-password', 'ProfileController@changePassword');
    Route::get('profile/delete/account', 'ProfileController@deleteAccount');
    Route::get('profile/delete/account/finally/{id}', 'ProfileController@deleteAccountfinally');

    // Route::get('enrole','HomepageController@enrole');

    Route::group(['middleware' => ['auth']], function () {

        Route::get('/course-details/{id}', 'HomepageController@courseDetails');
        Route::get('/course-details/{id}/checkout', 'HomepageController@enrole');
        Route::get('/school-program/{id}/checkout', 'HomepageController@schoolProgramEnrol');
        Route::get('enrole', 'HomepageController@enrole');
        Route::post('enrole/course', 'HomepageController@enroleSave');
        Route::post('enrole/course/school', 'HomepageController@enroleSchoolSave');
        Route::get('enrole-successfull-msg', 'HomepageController@enrollMsg');
        Route::get('enrole-successfull-msg-school', 'HomepageController@enrollMsgschool');
        Route::get('profile/report', 'StudentDashboard@report');

        // Message
        Route::get('message-list', 'MessageController@messageList');
        Route::get('getMessage', 'MessageController@getMessage');
        Route::post('insertMessage', 'MessageController@insertMessage');
        Route::post('chat_message', 'MessageController@chatMessage');
        // Route::post('msg','MessageController@msg')

        // Setting Option
        Route::get('profile/setting', 'UserDashboardController@profileSetting');
        Route::post('profile/setting', 'UserDashboardController@changePassword');

        // Dashboard
        Route::get('user/dashboard', 'DashboardController@userDashboard')->name('user.dashboard');
        Route::get('user/class', 'DashboardController@userClass');
        Route::get('notification', 'DashboardController@notification');
        Route::get('user-course-info', 'DashboardController@userCourseInfo')->name('user.course.info');

        Route::get('invoice', 'DashboardController@invoice');

        //  Live Msg
        Route::get('/livechatmessage/{id}', 'HomepageController@getMessage');
        Route::get('/live-chat', 'HomepageController@liveChat');
        Route::post('/msg', 'HomepageController@msg');
        Route::get('/livechat-student', 'HomepageController@livechatStudent');

        // Teacher
        Route::get('teacher/become-a-teacher', 'Teacher\TeacherController@becomeAteacher');
        Route::post('teacher/msg', 'Teacher\TeacherController@supportMsg');
        Route::post('teacher/request/{id}', 'Teacher\TeacherController@teacherRequest');

        // Teacher Profile Update
        Route::post('teacher/teacher-basic-info', 'Teacher\TeacherController@teacherBasicInfo');
        Route::post('teacher/teacher-education-info', 'Teacher\TeacherController@teacherEducationInfo');
        Route::post('teacher/teacher-courses-info', 'Teacher\TeacherController@teacherCourseInfo');

    });
});

//  Login And Registration with Facebook and Gmail

Route::get('register/facebook', 'Auth\RegisterController@redirectToProvider');
Route::get('register/facebook/callback', 'Auth\RegisterController@handleProviderCallback');

Route::get('logout', 'HomeController@logout');

//  Backend & Admin

//============================ Backend Route Start ============================//
Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm');
// Route::post('admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login');
Route::get('admin/register', 'Auth\AdminRegisterController@showRegistrationForm');
Route::post('admin/register', 'Auth\AdminRegisterController@register')->name('admin.register');
Route::group(['namespace' => 'Backend'], function () {
    Route::group(['middleware' => ['assign.guard:admin,admin/login']], function () {

        Route::prefix('admin')->group(function () {

            // Become-a-mashtor
            Route::get('become-a-mashtor/{id}', 'UsersController@becomeAMashotr');
            Route::post('/teacher/teacher-basic-info/{id}', 'UsersController@teacherProfileEdit');

            // All Users
            Route::get('all/users', 'UsersController@allUsers');

            //  Enroll
            Route::get('/delete/enroll/{id}', 'UsersController@deleteEnroll');
            Route::get('/show/enroll/{id}', 'UsersController@showEnroll');
            //  Mashtor Request
            Route::get('mashtor/request', 'HomeController@mashtorRequest');
            Route::get('mashtor/request/details/{id}', 'HomeController@mashtorRequestDetails');
            Route::post('mashtor/request/approve', 'HomeController@mashtorRequestApprove');

            Route::get('/enroll', 'UsersController@enroll');

            Route::get('/dashboard', 'HomeController@index')->name('dashboard');
            Route::get('/users', 'UsersController@showUsers');
            Route::get('/delete-users/{id}', 'UsersController@destroyUsers');
            Route::get('/edit-users/{id}', 'UsersController@editUsers');
            Route::POST('/edit-users/{id}', 'UsersController@updateUsers');
            Route::get('/change-password', 'UsersController@chnagePassword');
            Route::post('/change-password', 'UsersController@savePassword');

            // Discount Code
            Route::get('discount-code', 'DiscountCodeController@index');
            Route::get('discount-code-create', 'DiscountCodeController@create');
            Route::post('discount-code-create', 'DiscountCodeController@store');

            //User Course Category 
            Route::get('user-course-category', 'UserCourseCategoryController@index');
            Route::post('user-course-category-store', 'UserCourseCategoryController@store');
            Route::get('user-course-category-edit/{id}', 'UserCourseCategoryController@edit');
            Route::put('user-course-category-update/{id}', 'UserCourseCategoryController@update');
            Route::delete('user-course-category-delete/{id}', 'UserCourseCategoryController@destroy');

            //User Course 
            Route::get('user-course', 'UserCourseController@index');
            Route::post('user-course-store', 'UserCourseController@store');
            Route::get('user-course-edit/{id}', 'UserCourseController@edit');
            Route::put('user-course-update/{id}', 'UserCourseController@update');
            Route::delete('user-course-delete/{id}', 'UserCourseController@destroy');




            // course outline
            Route::resource('/courseoutline', 'CourseOutlineController');

            // course instructor
            Route::resource('/instructor', 'InstructorController');

            // Studnet Academic
            Route::resource('student_academic', 'StudentAcademicController');
            Route::resource('metarials', 'MetarialsController');
            Route::resource('courses', 'CourseController');
            Route::resource('coursescategory', 'CourseCategoryController');

            // Student
            Route::get('users/students', 'UsersController@getStudent');
            Route::get('/delete-users-student/{id}', 'UsersController@destroyUsersStudent');
            Route::get('/show-student/{id}', 'UsersController@showStudent');
            // Tutors
            Route::get('users/tutors', 'UsersController@getTutors');
            Route::get('/delete-users-tutor/{id}', 'UsersController@destroyUsersTutor');
            Route::get('/show-tutor/{id}', 'UsersController@showTutor');
            Route::get('tutor/request', 'UsersController@tutorRequest');
            Route::get('request/show-tutor/{id}', 'UsersController@showTutorRequest');
            Route::post('request/show-tutor/{id}', 'UsersController@tutorApprove');
            // Franchise
            Route::get('users/franchise', 'UsersController@getFranchise');

            Route::get('/delete-users-franchise/{id}', 'UsersController@destroyUsersFranchise');
            Route::get('/show-franchise/{id}', 'UsersController@showFranchise');

            Route::resource('/menus', 'MenusController');
            Route::resource('/blogCat', 'CategoryController');
            Route::resource('/blog', 'BlogController');
            Route::resource('/brand', 'BrandController');

            // University
            Route::resource('/university', 'UniversityNameControllr');

            // Pages
            Route::get('/about/description', 'AboutUsController@description');
            Route::post('/about/description/store', 'AboutUsController@description_store');
            Route::post('/about/description/update/{id}', 'AboutUsController@description_update');
            Route::get('/about/description/destroy/{id}', 'AboutUsController@description_destroy');

            Route::get('/about/mission', 'AboutUsController@mission');
            Route::post('/about/mission/store', 'AboutUsController@mission_post');
            Route::post('/about/mission/update/{id}', 'AboutUsController@mission_post_update');
            Route::get('/about/mission/destroy/{id}', 'AboutUsController@mission_destroy');

            Route::get('/about/vission', 'AboutUsController@vission');
            Route::post('/about/vission/store', 'AboutUsController@vission_post');
            Route::post('/about/vission/update/{id}', 'AboutUsController@vission_update');
            Route::get('/about/vission/destroy/{id}', 'AboutUsController@vission_destroy');

            Route::get('/about/values', 'AboutUsController@values');
            Route::post('/about/values/store', 'AboutUsController@values_post');
            Route::post('/about/values/update/{id}', 'AboutUsController@values_update');
            Route::get('/about/values/destroy/{id}', 'AboutUsController@values_destroy');

            // Studnet Explore
            Route::resource('student_experience', 'StudentExploreController');
            Route::resource('university_logo', 'UniversityLogoController');
            //  Education Mangement

            Route::resource('/level', 'LevelController');
            Route::resource('/subject', 'SubjectController');
            Route::resource('/faculty', 'FacultyController');
            Route::resource('/session', 'SessionController');
            Route::resource('/medium', 'MediumController');
            Route::resource('/language', 'LanguageController');
            Route::resource('/traning', 'ProfessionalTraningController');
            Route::resource('/group', 'GroupController');
            Route::resource('/department', 'DepartmentControlle');

            //  Advaisori team

            Route::resource('advisor', 'AdvisiorTeamController');

            // Message From Frontend
            Route::get('suggesion', 'SuggesionManageController@suggestionList');
            Route::get('suggesion/delete', 'SuggesionManageController@suggestionDelete');

            // Ajax and jquery request
            Route::get('level/{level}/faculty', 'SubjectController@getFaculty');

            Route::get('/product/attributes/{id}', 'ProductAttrabuteController@addProductAttributes');
            Route::post('/product/attributes/{id}', 'ProductAttrabuteController@saveProductAttributes');
            Route::resource('/product/category', 'ProductCategoryController');
            Route::resource('/product/features', 'ProductFeaturesController');
            Route::resource('/product', 'ProductController');
            Route::resource('doctor/specialities', 'DoctorSpecialitiesController');
            // Route::get('{slug}','CategoryController@slug');
            Route::group(['namespace' => 'Website'], function () {
                Route::resource('/submenu', 'SubmenuController');
                Route::resource('/slider', 'SliderController');
                Route::resource('/aboutus', 'AboutController');
                Route::resource('/component', 'ComponentController');
                //Route::resource('/instructor','InstructorController');
                Route::resource('/website_setting', 'WebsiteSettingController');
                Route::resource('/team', 'TeamController');
                Route::resource('/gallery', 'GalleryController');
                Route::resource('/news-category', 'NewsCateoryController');
                Route::resource('/news-posts', 'NewsController');
                Route::resource('/emercency', 'EmarcencyInfo');
                Route::resource('/gallery-category', 'GalleryCategoryController');
                Route::get('/contact', 'DonateController@donate_list');

            });
        });
    });
});