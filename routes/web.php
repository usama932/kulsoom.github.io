<?php
use App\Http\Controllers\AutherController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookIssueController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\CustomUserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VanController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\FeesController;




use Illuminate\Support\Facades\Route;

Auth::routes();
/*Initialize all Website Routes */
Route::view('/', 'index')->name('index');
Route::view('/contact', 'contact')->name('contact');
Route::view('/about', 'about')->name('about');
Route::view('/career', 'career')->name('career');
Route::view('/jobposts', 'jobposts')->name('jobposts');

Route::view('/achievement', 'achievement')->name('achievement');
Route::view('/career', 'career')->name('career');
Route::view('/careers', 'careers')->name('careers');
Route::view('/applyjob', 'applyjob')->name('applyjob');

Route::view('/admission', 'admission')->name('admission');
Route::view('/shop', 'shop')->name('bookshop');
Route::view('/items', 'items')->name('item');

Route::view('/course', 'course')->name('course');
Route::view('/student', 'student')->name('student');
Route::view('/customers/register', 'customers/register')->name('register');
Route::view('/customers/login', 'customers/login')->name('custlogin');



/* For Admin Panel */
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@dashboard')->name('home');
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

    Route::group(['prefix' => 'my_account'], function () {
        Route::get('/', 'MyAccountController@edit_profile')->name('my_account');
        Route::put('/', 'MyAccountController@update_profile')->name('my_account.update');
        Route::put('/change_password', 'MyAccountController@change_pass')->name('my_account.change_pass');
    });

/*************** Support Team *****************/
Route::group(['namespace' => 'SupportTeam',], function () {

     /*************** Students *****************/
    Route::group(['prefix' => 'students'], function () {
      Route::get('reset_pass/{st_id}', 'StudentRecordController@reset_pass')->name('st.reset_pass');
        Route::get('graduated', 'StudentRecordController@graduated')->name('students.graduated');
        Route::put('not_graduated/{id}', 'StudentRecordController@not_graduated')->name('st.not_graduated');
        Route::get('list/{class_id}', 'StudentRecordController@listByClass')->name('students.list')->middleware('teamSAT');
    });

    /*************** Users *****************/
    Route::group(['prefix' => 'users'], function () {
        Route::get('reset_pass/{id}', 'UserController@reset_pass')->name('users.reset_pass');
    });

    /*************** TimeTables *****************/
    Route::group(['prefix' => 'timetables'], function () {
        Route::get('/', 'TimeTableController@index')->name('tt.index');

            Route::group(['middleware' => 'teamSA'], function () {
                Route::post('/', 'TimeTableController@store')->name('tt.store');
                Route::put('/{tt}', 'TimeTableController@update')->name('tt.update');
                Route::delete('/{tt}', 'TimeTableController@delete')->name('tt.delete');
            });

            /*************** TimeTable Records *****************/
            Route::group(['prefix' => 'records'], function () {

                Route::group(['middleware' => 'teamSA'], function () {
                    Route::get('manage/{ttr}', 'TimeTableController@manage')->name('ttr.manage');
                    Route::post('/', 'TimeTableController@store_record')->name('ttr.store');
                    Route::get('edit/{ttr}', 'TimeTableController@edit_record')->name('ttr.edit');
                    Route::put('/{ttr}', 'TimeTableController@update_record')->name('ttr.update');
                });

                Route::get('show/{ttr}', 'TimeTableController@show_record')->name('ttr.show');
                Route::get('print/{ttr}', 'TimeTableController@print_record')->name('ttr.print');
                Route::delete('/{ttr}', 'TimeTableController@delete_record')->name('ttr.destroy');
            });

            /*************** Time Slots *****************/
            Route::group(['prefix' => 'time_slots', 'middleware' => 'teamSA'], function () {
                Route::post('/', 'TimeTableController@store_time_slot')->name('ts.store');
                Route::post('/use/{ttr}', 'TimeTableController@use_time_slot')->name('ts.use');
                Route::get('edit/{ts}', 'TimeTableController@edit_time_slot')->name('ts.edit');
                Route::delete('/{ts}', 'TimeTableController@delete_time_slot')->name('ts.destroy');
                Route::put('/{ts}', 'TimeTableController@update_time_slot')->name('ts.update');
            });
        });

        /*************** Marks *****************/
        Route::group(['prefix' => 'marks'], function () {

            // FOR teamSA
            Route::group(['middleware' => 'teamSA'], function () {
                Route::get('batch_fix', 'MarkController@batch_fix')->name('marks.batch_fix');
                Route::put('batch_update', 'MarkController@batch_update')->name('marks.batch_update');
            });

            // FOR teamSAT
            Route::group(['middleware' => 'teamSAT'], function () {
                Route::get('/', 'MarkController@index')->name('marks.index');
                Route::get('manage/{exam}/{class}/{section}/{subject}', 'MarkController@manage')->name('marks.manage');
                Route::put('update/{exam}/{class}/{section}/{subject}', 'MarkController@update')->name('marks.update');
                Route::put('comment_update/{exr_id}', 'MarkController@comment_update')->name('marks.comment_update');
                Route::put('skills_update/{skill}/{exr_id}', 'MarkController@skills_update')->name('marks.skills_update');
                Route::post('selector', 'MarkController@selector')->name('marks.selector');
                Route::get('bulk/{class?}/{section?}', 'MarkController@bulk')->name('marks.bulk');
                Route::post('bulk', 'MarkController@bulk_select')->name('marks.bulk_select');
            });

            Route::get('select_year/{id}', 'MarkController@year_selector')->name('marks.year_selector');
            Route::post('select_year/{id}', 'MarkController@year_selected')->name('marks.year_select');
            Route::get('show/{id}/{year}', 'MarkController@show')->name('marks.show');
            Route::get('print/{id}/{exam_id}/{year}', 'MarkController@print_view')->name('marks.print');
        });

        Route::resource('students', 'StudentRecordController');
        Route::resource('users', 'UserController');
        Route::resource('classes', 'MyClassController');
        Route::resource('sections', 'SectionController');
        Route::resource('subjects', 'SubjectController');
        Route::resource('grades', 'GradeController');
        Route::resource('exams', 'ExamController');
    });

    /************************ AJAX ****************************/
    Route::group(['prefix' => 'ajax'], function () {
        Route::get('get_lga/{state_id}', 'AjaxController@get_lga')->name('get_lga');
        Route::get('get_class_sections/{class_id}', 'AjaxController@get_class_sections')->name('get_class_sections');
        Route::get('get_class_subjects/{class_id}', 'AjaxController@get_class_subjects')->name('get_class_subjects');
    });

     // author CRUD
     Route::get('/authors', [AutherController::class, 'index'])->name('authors');
     Route::get('/authors/create', [AutherController::class, 'create'])->name('authors.create');
     Route::get('/authors/edit/{auther}', [AutherController::class, 'edit'])->name('authors.edit');
     Route::post('/authors/update/{id}', [AutherController::class, 'update'])->name('authors.update');
     Route::delete('/authors/delete/{id}', [AutherController::class, 'destroy'])->name('authors.destroy');
     Route::post('/authors/create', [AutherController::class, 'store'])->name('authors.store');
 
     // publisher crud
     Route::get('/publishers', [PublisherController::class, 'index'])->name('publishers');
     Route::get('/publisher/create', [PublisherController::class, 'create'])->name('publisher.create');
     Route::get('/publisher/edit/{publisher}', [PublisherController::class, 'edit'])->name('publisher.edit');
     Route::post('/publisher/update/{id}', [PublisherController::class, 'update'])->name('publisher.update');
     Route::delete('/publisher/delete/{id}', [PublisherController::class, 'destroy'])->name('publisher.destroy');
     Route::post('/publisher/create', [PublisherController::class, 'store'])->name('publisher.store');
 
     // Category CRUD
     Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
     Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
     Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
     Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
     Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
     Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');

     // books CRUD
     Route::get('/books', [BookController::class, 'index'])->name('books');
     Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
     Route::get('/book/edit/{book}', [BookController::class, 'edit'])->name('book.edit');
     Route::post('/book/update/{id}', [BookController::class, 'update'])->name('book.update');
     Route::delete('/book/delete/{id}', [BookController::class, 'destroy'])->name('book.destroy');
     Route::post('/book/create', [BookController::class, 'store'])->name('book.store');

    // books Issue CRUD
     Route::get('/book-issue', [BookIssueController::class, 'index'])->name('book_issued');
     Route::get('/book-issue/edit/{id}', 'BookIssueController@edit')->name('book_issue.edit');
     Route::post('/book-issue/update/{id}/{fine}', [BookIssueController::class, 'update'])->name('book_issue.update');
     Route::delete('/book-issue/delete/{id}', [BookIssueController::class, 'destroy'])->name('book_issue.destroy');
     Route::post('/book-issue', [BookIssueController::class, 'store'])->name('book_issue.store');
 
    // Fine
    Route::get('/fine', [SettingsController::class, 'index'])->name('fine');
    Route::post('/fine', [SettingsController::class, 'update'])->name('fine.update');
    // Career
   // Route::get('/career/index', [CareerController::class, 'index'])->name('career.index');
    //Route::delete('/career/delete', [CareerController::class, 'destroy'])->name('career.destroy');
   // Route::post('/career/download', [CareerController::class, 'getDownload'])->name('career.download');
});

 /*************** Student Attendance *****************/
 Route::match(['get','post'],'student/attendance','AttendanceController@student_attendance')->name('student_attendance.create');
 Route::post('student/attendance/save', 'AttendanceController@student_attendance_save')->name('student_attendance.create');
 
/************************ SUPER ADMIN ****************************/
Route::group(['namespace' => 'SuperAdmin', 'middleware' => 'super_admin', 'prefix' => 'super_admin'], function () {

    Route::get('/settings', 'SettingController@index')->name('settings');
    Route::put('/settings', 'SettingController@update')->name('settings.update');
});

/************************ PARENT ****************************/
Route::group(['namespace' => 'MyParent', 'middleware' => 'my_parent',], function () {

    Route::get('/my_children', 'MyController@children')->name('my_children');
});
    // Career
   Route::post('/career', [CareerController::class, 'store'])->name('career.store');

    //contact
    //Route::resource('contact','ContactController');
    Route::post('/contact',[ContactController::class,'store']);
    Route::get('/contact/index',[ContactController::class, 'index'])->name('contact.index');
    Route::delete('/contact/delete', [ContactController::class, 'destroy'])->name('contact.destroy');

    // Route::resource('contact','ContactController');

    //admission

    Route::post('/admission',[AdmissionController::class,'store']);
    Route::get('/admission/index',[AdmissionController::class, 'index'])->name('admission.index');
    Route::delete('/admission/delete', [AdmissionController::class, 'destroy'])->name('admission.destroy');

    //user
    Route::post('/customers/registeruser',[CustomUserController::class,'registerUser'])->name('customers.registeruser');
    Route::post('/customers/login',[CustomUserController::class,'loginUser'])->name('customers.loginuser');

    Route::get('/customers/logout',[CustomUserController::class,'logout'])->name('customers.logout');


    //shop
  //  Route::view('/shop/create', 'shop/create')->name('shop.create');

   Route::get('/shop',[ShopController::class, 'index'])->name('shop.create');
    //Route::get('/shop', [ShopController::class, 'create'])->name('shop.create');
    // Route::get('/shop/edit/{book}', [BookController::class, 'edit'])->name('book.edit');
    // Route::post('/shop/update/{id}', [BookController::class, 'update'])->name('book.update');
    // Route::delete('/shop/delete/{id}', [BookController::class, 'destroy'])->name('book.destroy');
    Route::post('/shop/create', [ShopController::class, 'store'])->name('shop.store');

    Route::get('/shop/index',[ShopController::class, 'index'])->name('shop.index');
   // Route::resource('shop','ShopController');
   Route::delete('/shop/delete', [ShopController::class, 'destroy'])->name('shop.destroy');

   //shopping

   Route::get('shop',[ShopController::class, 'showAll'])->name('shopping');
   Route::get('productdetail/{id}',[ShopController::class, 'show'])->name('productdetail');
   Route::post('cart',[ShopController::class, 'addToCart'])->name('addtocart');

   Route::get('cart',[ShopController::class, 'cartList'])->name('cart');
   Route::get('/removecart/{key}',[ShopController::class, 'removeCart']);
   Route::post('thankyou',[ShopController::class, 'orderNow'])->name('order');
   Route::get('thankyou',[ShopController::class, 'thankyou'])->name('thankyou');
   Route::get('search',[ShopController::class, 'searchData'])->name('search');
   Route::get('computer',[ShopController::class, 'filterIT'])->name('filtit');
   Route::get('medical',[ShopController::class, 'filterMedical'])->name('filtmed');
   Route::get('science',[ShopController::class, 'filterScience'])->name('filtsc');
   Route::get('arts',[ShopController::class, 'filterArts'])->name('filtart');
   Route::get('commerce',[ShopController::class, 'filterCommerce'])->name('filtcom');
   Route::get('poetry',[ShopController::class, 'filterPoetry'])->name('filtpt');
   Route::get('lowprice',[ShopController::class, 'lowPrice'])->name('lowprice');
   Route::get('midprice',[ShopController::class, 'midPrice'])->name('midprice');
   Route::get('highprice',[ShopController::class, 'highPrice'])->name('highprice');








   //orders

   Route::get('/order/index',[ShopController::class, 'showAllOrders'])->name('order.index');
   Route::delete('/order/delete', [ShopController::class, 'deleteOrder'])->name('order.destroy');
   Route::get('myorders',[ShopController::class, 'myOrder'])->name('myorder');



  // Route::resource('shopping','ShopController');
//mail
  Route::post('/send',[ShopController::class,'send'])->name('send');

  //transport

  Route::get('/transport/driver',[DriverController::class, 'index'])->name('drivers');
  Route::post('/transport/create',[DriverController::class, 'store'])->name('drivers.store');
  Route::delete('/transport/delete', [DriverController::class, 'destroy'])->name('driver.destroy');

  Route::get('/transport/vans',[VanController::class, 'index'])->name('vans.index');
  Route::post('/transport/vans',[VanController::class, 'store'])->name('vans.store');
  Route::delete('/van/delete', [VanController::class, 'destroy'])->name('vans.destroy');


  Route::get('/transport/students',[TransportController::class, 'index'])->name('transport.index');
  Route::post('/transport/students',[TransportController::class, 'store'])->name('transport.store');
  Route::delete('/stdtrans/delete', [TransportController::class, 'destroy'])->name('transport.destroy');


  //job portal

  Route::get('jobportal/index',[JobController::class, 'index'])->name('jobs.index');
  Route::post('jobportal/index',[JobController::class, 'store'])->name('jobs.store');
  Route::delete('job/delete', [JobController::class, 'destroy'])->name('jobs.destroy');

  Route::get('jobposts',[JobController::class, 'showAll'])->name('jobposts');

 // Route::get('career/{key}',[CareerController::class, 'apply'])->name('applyhere');
  Route::get('applyjob/{key}',[JobController::class, 'applyjob'])->name('apply.job');
  Route::post('applyjob',[JobController::class, 'applied'])->name('applied');
  Route::get('/career/index',[JobController::class, 'allAppliedJobs'])->name('career.index');
  Route::delete('/career/delete', [JobController::class, 'deleteApplication'])->name('career.destroy');
  Route::post('/career/download', [JobController::class, 'getDownload'])->name('career.download');

  Route::get('searchedjob',[JobController::class, 'searchData'])->name('searched');
  Route::get('faculty',[JobController::class, 'filterFaculty'])->name('filtfaculty');
  Route::get('admin',[JobController::class, 'filterAdmin'])->name('filtadmin');
  Route::get('assistant',[JobController::class, 'filterAssistant'])->name('filtassist');
  Route::get('fulltime',[JobController::class, 'filterFulltime'])->name('fulltime');
  Route::get('parttime',[JobController::class, 'filterParttime'])->name('parttime');


  //fees management

  Route::get('/sttudentmanage/classindex',[StudentClassController::class, 'index'])->name('studentclass');
  Route::post('/sttudentmanage/classindex',[StudentClassController::class, 'store'])->name('studentclass.store');
  Route::delete('/classindex/delete', [StudentClassController::class, 'destroy'])->name('studentclass.destroy');

  Route::get('/sttudentmanage/feesindex',[StudentClassController::class, 'allFees'])->name('allclassfees');
  Route::post('/sttudentmanage/feesindex',[StudentClassController::class, 'allFeesStore'])->name('allclassfeesstore');
  Route::delete('/feesindex/delete', [StudentClassController::class, 'allFeesDelete'])->name('allclassfeesdelete');


//   Route::get('/sttudentmanage/feesindex',[FeesController::class, 'index'])->name('fees.index');
//   Route::post('/sttudentmanage/feesindex',[FeesController::class, 'store'])->name('feesindex.store');
//   Route::delete('/feesindex/delete', [FeesController::class, 'destroy'])->name('feesindex.destroy');


 



  
