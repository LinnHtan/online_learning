<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaymentController;
use Illuminate\Contracts\Auth\UserProvider;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ListUserController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AjaxAdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\User\AjaxController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\FreeCourseController;
use App\Http\Controllers\PopularCourseController;
use App\Http\Controllers\EnrolledCourseController;
use App\Http\Controllers\FeedBackController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UpComingCourseController;
use App\Http\Controllers\User\UserCourseController;
use App\Http\Controllers\User\EnrollCourseController;
use App\Http\Controllers\User\UserPaymentController;
use Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector;

Route::get('/', function () {
    return view('welcome');
});

Route::group([ 'middleware'=>'prevent_logged_in'],function(){
    //login register
    Route::get('loginPage',[AuthController::class,'login'])->name('auth#loginPage');
    Route::get('registerPage',[AuthController::class,'register'])->name('auth#registerPage');


});
// Route::middleware(['auth'])->group(function () {



Route::middleware(['auth'])->group(function () {

    //dashboard between user and admin
    Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');

    //admin
    Route::group(['prefix' => 'admin' , 'middleware'=>'admin_auth'],function(){

        //admin home page
        Route::get('admin/homePage',[AdminHomeController::class,'adminHome'])->name('admin#homePage');
        Route::get('test',[AdminHomeController::class,'test'])->name('admin#test');
        Route::get('list',[AdminHomeController::class,'list'])->name('category#list');

        //profile
        Route::group(['prefix' => 'profile' ],function(){

            Route::get('change/password',[AdminController::class,'changePasswordPage'])->name('profile#changePasswordPage');
            Route::post('change/password',[AdminController::class,'changePassword'])->name('profile#changePassword');
            Route::get('detail',[AdminController::class,'detailPage'])->name('profileAdmin#detailPage');
            Route::get('edit/page',[AdminController::class,'editPage'])->name('profileAdmin#editPage');
            Route::post('update/{id}',[AdminController::class,'update'])->name('profileAdmin#update');


        });

        Route::group(['prefix' => 'category' ],function(){

            Route::get('create/page',[CategoryController::class,'createPage'])->name('category#createPage');
            Route::post('category/create',[CategoryController::class,'createCategory'])->name('category#create');
            Route::get('list/page',[CategoryController::class,'listPage'])->name('category#listPage');
            Route::get('delete/{id}',[CategoryController::class,'delete'])->name('category#delete');
            Route::get('edit/{id}',[CategoryController::class,'editPage'])->name('category#editPage');
            Route::post('update/{id}',[CategoryController::class,'updateCategory'])->name('category#update');
        });

        Route::group(['prefix' => 'payment' ],function(){

            Route::get('create/page',[PaymentController::class,'createPage'])->name('payment#createPage');
            Route::post('category/create',[PaymentController::class,'createPayment'])->name('payment#create');
            Route::get('list/page',[PaymentController::class,'listPage'])->name('payment#listPage');
            Route::get('delete/{id}',[PaymentController::class,'delete'])->name('payment#delete');
            Route::get('edit/{id}',[PaymentController::class,'editPage'])->name('payment#editPage');
            Route::post('update/{id}',[PaymentController::class,'updatePayment'])->name('payment#update');
        });

        Route::group(['prefix' => 'course' ],function(){

           Route::get('create/page',[CourseController::class,'createPage'])->name('course#createPage');
           Route::post('create/course',[CourseController::class,'createCourse'])->name('course#createCourse');
           Route::get('list/page',[CourseController::class,'listPage'])->name('course#listPage');
           Route::get('detail/{id}',[CourseController::class,'detailPage'])->name('course#detailPage');
           Route::get('delete/{id}',[CourseController::class,'delete'])->name('course#delete');
           Route::get('edit/{id}',[CourseController::class,'editPage'])->name('course#editPage');
           Route::post('update/{id}',[CourseController::class,'update'])->name('course#update');
        });

        Route::group(['prefix' => 'UpComingCourse' ],function(){

            Route::get('create/page',[UpComingCourseController::class,'createPage'])->name('UpComingCourse#createPage');
            Route::post('create/course',[UpComingCourseController::class,'createCourse'])->name('UpComingCourse#createCourse');
            Route::get('list/page',[UpComingCourseController::class,'listPage'])->name('UpComingCourse#listPage');
            Route::get('detail/{id}',[UpComingCourseController::class,'detailPage'])->name('UpComingCourse#detailPage');
            Route::get('delete/{id}',[UpComingCourseController::class,'delete'])->name('UpComingCourse#delete');
            Route::get('edit/{id}',[UpComingCourseController::class,'editPage'])->name('UpComingCourse#editPage');
            Route::post('update/{id}',[UpComingCourseController::class,'update'])->name('UpComingCourse#update');
         });

         Route::group(['prefix' => 'popularCourse' ],function(){

            Route::get('create/page',[PopularCourseController::class,'createPage'])->name('popularCourse#createPage');
            Route::post('create/course',[PopularCourseController::class,'createCourse'])->name('popularCourse#createCourse');
            Route::get('list/page',[PopularCourseController::class,'listPage'])->name('popularCourse#listPage');
            Route::get('detail/{id}',[PopularCourseController::class,'detailPage'])->name('popularCourse#detailPage');
            Route::get('delete/{id}',[PopularCourseController::class,'delete'])->name('popularCourse#delete');
            Route::get('edit/{id}',[PopularCourseController::class,'editPage'])->name('popularCourse#editPage');
            Route::post('update/{id}',[PopularCourseController::class,'update'])->name('popularCourse#update');
         });

         Route::group(['prefix' => 'freeCourse' ],function(){

            Route::get('create/page',[FreeCourseController::class,'createPage'])->name('freeCourse#createPage');
            Route::post('create/course',[FreeCourseController::class,'createCourse'])->name('freeCourse#createCourse');
            Route::get('list/page',[FreeCourseController::class,'listPage'])->name('freeCourse#listPage');
            Route::get('detail/{id}',[FreeCourseController::class,'detailPage'])->name('freeCourse#detailPage');
            Route::get('delete/{id}',[FreeCourseController::class,'delete'])->name('freeCourse#delete');
            Route::get('edit/{id}',[FreeCourseController::class,'editPage'])->name('freeCourse#editPage');
            Route::post('update/{id}',[FreeCourseController::class,'update'])->name('freeCourse#update');
         });

         Route::group(['prefix' => 'message' ],function(){

            Route::get('create/page',[MessageController::class,'createPage'])->name('message#createPage');
            Route::post('send/message',[MessageController::class,'send'])->name('message#send');
            Route::get('feed/back',[MessageController::class,'feedBack'])->name('message#feedBack');
         });

         Route::group(['prefix' => 'enrolledList' ],function(){

            Route::get('list/Page',[EnrolledCourseController::class,'enrolledList'])->name('enrolled#listPage');
            Route::post('change/status/{id}',[EnrolledCourseController::class,'statusChange'])->name('enrolled#statusChange');
         });

         Route::group(['prefix' => 'ajaxAdmin' ],function(){

            Route::get('sort/status',[AjaxAdminController::class,'sortAjax'])->name('ajax#sortStatus');

         });


         Route::group(['prefix' => 'lesson' ],function(){

            Route::get('create/lesson',[LessonController::class,'lessonPage'])->name('lesson#page');
            Route::post('lesson',[LessonController::class,'lesson'])->name('lesson#create');
            Route::get('sample',[LessonController::class,'sample'])->name('lesson#sample');

           });

         Route::group(['prefix' => 'user' ],function(){
              //user
              Route::get('user/list',[ListUserController::class,'userList'])->name('user#userlistPage');
              Route::get('detail/{id}',[ListUserController::class,'userDetail'])->name('user#userDetail');
              Route::get('delete/{id}',[ListUserController::class,'delete'])->name('user#delete');

         });




    });


    //user
    Route::group(['prefix' => 'user' , 'middleware'=>'user_auth'],function(){

        //user home page
        Route::get('user/homePage',[UserHomeController::class,'userHome'])->name('user#homePage');
        //news message
        Route::get('message',[UserHomeController::class,'message'])->name('user#message');


        Route::group(['prefix' => 'profile' ],function(){

            Route::get('change/page',[UserController::class,'changePage'])->name('profile#changePage');
            Route::post('change',[UserController::class,'change'])->name('profile#userChange');
            Route::get('detail',[UserController::class,'detailPage'])->name('profile#detailPage');
            Route::get('edit/page',[UserController::class,'editPage'])->name('profile#editPage');
            Route::post('update/{id}',[UserController::class,'update'])->name('profile#update');


       });

       Route::group(['prefix' => 'course' ],function(){

        Route::get('open/course',[UserCourseController::class,'openCourseList'])->name("open#courseList");

        Route::get('coming/course',[UserCourseController::class,'comingCourseList'])->name("coming#courseList");

        Route::get('popular/course',[UserCourseController::class,'popularCourseList'])->name("popular#courseList");

        Route::get('free/course',[UserCourseController::class,'freeCourseList'])->name("free#courseList");



   });

   Route::group(['prefix' => 'enrollCourse' ],function(){

    Route::get('enroll/course/page', [EnrollCourseController::class,'enrollList'])->name('enrollCourse#page');
    Route::get('my/payment',[EnrollCourseController::class,'myPayment'])->name('myPayment#page');

    Route::get('my/class',[EnrollCourseController::class,'myClass'])->name('myClass#page');
    Route::get('my/class/detail',[EnrollCourseController::class,'classDetail'])->name('class#detail');

    Route::get('my/class/free',[EnrollCourseController::class,'myFreeClass'])->name('myFree#page');

 });


 Route::group(['prefix' => 'payment' ],function(){

   Route::get('user/payment{id}',[UserPaymentController::class,'userPayment'])->name('payment#paymentPage');
   Route::post('send/payment',[UserPaymentController::class,'sendPayment'])->name('payment#sendPayment');

 });


 Route::group(['prefix' => 'feedback' ],function(){

    Route::get('create/feedback',[FeedBackController::class,'feedbackPage'])->name('feedback#page');
    Route::post('send',[FeedBackController::class,'sendData'])->name('feedback#sendData');

  });

  Route::group(['prefix' => 'discussion' ],function(){
    //topic
    Route::get('topic/page',[TopicController::class,'topicPage'])->name('topic#page');
    Route::post('make/topic',[TopicController::class,'createTopic'])->name('create#topic');
    Route::get('get/topic',[TopicController::class,'allTopic'])->name('get#allTopicData');

    //comment
    Route::get('topic/page/{id}',[CommentController::class,'comment'])->name('topic#dataPage');
    Route::post('comment/data',[CommentController::class,'commentData'])->name('comment#data');



  });

   Route::group(['prefix' => 'ajax' ],function(){

   Route::get('course/enroll/page',[AjaxController::class,'courseEnrollList'])->name('course#ajaxEnrollList');
   Route::get('course/enroll',[AjaxController::class,'courseEnroll'])->name('course#ajaxEnroll');

   Route::get('popular/enroll',[AjaxController::class,'popularEnroll'])->name('popular#ajxEnroll');

   Route::get('coming/enroll',[AjaxController::class,'comingEnroll'])->name('coming#ajxEnroll');

   Route::get('free/enroll',[AjaxController::class,'freeEnroll'])->name('free#ajxEnroll');


});





    });


});









