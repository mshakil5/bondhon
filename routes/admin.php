<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WhyChooseUsController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\FundraiserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Admin\ContactMailController; 
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ContributorController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EmailContentController;
use App\Http\Controllers\Admin\DonationTypeController;
use App\Http\Controllers\Admin\VolunteerController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\VideoBlogCategoryController;
use App\Http\Controllers\Admin\VideoBlogController;



/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::group(['prefix' =>'admin/', 'middleware' => ['auth', 'is_admin']], function(){
  
    Route::get('/dashboard', [HomeController::class, 'adminHome'])->name('admin.dashboard');
    //profile
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::put('profile/{id}', [AdminController::class, 'adminProfileUpdate']);
    Route::post('changepassword', [AdminController::class, 'changeAdminPassword']);
    Route::put('image/{id}', [AdminController::class, 'adminImageUpload']);
    //profile end
    //admin registration
    Route::get('register','App\Http\Controllers\Admin\AdminController@adminindex')->name('admin.registration');
    Route::post('register','App\Http\Controllers\Admin\AdminController@adminstore');
    Route::get('register/{id}/edit','App\Http\Controllers\Admin\AdminController@adminedit');
    Route::put('register/{id}','App\Http\Controllers\Admin\AdminController@adminupdate');
    Route::get('register/{id}', 'App\Http\Controllers\Admin\AdminController@admindestroy');
    //admin registration end

    //company details
    Route::resource('company-detail','App\Http\Controllers\Admin\CompanyDetailController');
    //company details end

    

    // donor
    Route::get('/donor', [UserController::class, 'getAllDonor'])->name('admin.alldonor');
    Route::post('/donor', [UserController::class, 'newDonorStore']);
    Route::get('/donor/{id}', [UserController::class, 'donorDelete']);
    
    // fundraiser profile
    Route::get('/fundraiser-profile/{id}', [UserController::class, 'fundraiserProfile'])->name('admin.fundraiserProfile');

    // fundraiser donation
    Route::get('/fundraiser-donation/{id}', [FundraiserController::class, 'fundraiserDonation'])->name('admin.fundraiserdonation');
    Route::get('/fundraiser-transaction/{id}', [FundraiserController::class, 'fundraiserTransaction'])->name('admin.fundraisertran');

    // active deactive fundraiser
    Route::get('active-donor', [UserController::class, 'activeDonor']);

    


    // sliders
    Route::get('/sliders', [SliderController::class, 'index'])->name('admin.sliders');
    Route::post('/sliders', [SliderController::class, 'store']);
    Route::get('/sliders/{id}/edit', [SliderController::class, 'edit']);
    Route::put('/sliders/{id}', [SliderController::class, 'update']);
    Route::get('/sliders/{id}', [SliderController::class, 'delete']);

    Route::post('/slider-status', [SliderController::class, 'toggleStatus'])->name('slider.status');

    Route::get('/section-status', [SectionController::class, 'sectionStatus'])->name('sectionstatus');
    Route::post('/section-status/update', [SectionController::class, 'updateSectionStatus'])->name('updateSectionStatus');


    // contact mail 
    Route::get('/contact-mail', [ContactMailController::class, 'index'])->name('admin.contact-mail');
    Route::get('/contact-mail/{id}/edit', [ContactMailController::class, 'edit']);
    Route::put('/contact-mail/{id}', [ContactMailController::class, 'update'])->name('admin.contact.update');

    // why-choose-us
    Route::get('/why-choose-us', [WhyChooseUsController::class, 'index'])->name('admin.whychooseus');
    Route::post('/why-choose-us', [WhyChooseUsController::class, 'store']);
    Route::get('/why-choose-us/{id}/edit', [WhyChooseUsController::class, 'edit']);
    Route::put('/why-choose-us/{id}', [WhyChooseUsController::class, 'update']);
    Route::get('/why-choose-us/{id}', [WhyChooseUsController::class, 'delete']);
    
    // all-data
    Route::get('/all-data', [MasterController::class, 'index'])->name('admin.master');
    Route::post('/all-data', [MasterController::class, 'store']);
    Route::get('/all-data/{id}/edit', [MasterController::class, 'edit']);
    Route::put('/all-data/{id}', [MasterController::class, 'update']);
    
    // email-content
    Route::get('/email-content', [EmailContentController::class, 'index'])->name('admin.emailcontent');
    Route::post('/email-content', [EmailContentController::class, 'store']);
    Route::get('/email-content/{id}/edit', [EmailContentController::class, 'edit']);
    Route::put('/email-content/{id}', [EmailContentController::class, 'update']);
    Route::get('/email-content/{id}', [EmailContentController::class, 'delete']);

    // all-data
    Route::get('/home-top-section', [MasterController::class, 'homeTopSection'])->name('admin.hometopsection');
    Route::post('/home-top-section', [MasterController::class, 'homeTopSectionUpdate']);

    // payment
    // Route::get('/fundraiser-pay/{id}', [TransactionController::class, 'fundraiserPay'])->name('admin.fundraiserPay');
    // Route::post('/fundraiser-pay', [TransactionController::class, 'fundraiserPayStore'])->name('admin.fundraiserPaystore');


    
    // donation-type
    Route::get('/donation-type', [DonationTypeController::class, 'index'])->name('admin.donationtype');
    Route::get('/projects', [DonationTypeController::class, 'projects'])->name('admin.projects');
    Route::post('/donation-type', [DonationTypeController::class, 'store']);
    Route::get('/donation-type/{id}/edit', [DonationTypeController::class, 'edit']);
    Route::put('/donation-type/{id}', [DonationTypeController::class, 'update']);
    Route::get('/donation-type/{id}', [DonationTypeController::class, 'delete']);

    
    Route::get('/transaction-view/{id}', [TransactionController::class, 'viewTransactionByAdmin'])->name('admin.transactionView');
    
    
    // category
    Route::get('/category', [GalleryController::class, 'category'])->name('admin.category');
    Route::post('/category', [GalleryController::class, 'categorystore']);
    Route::get('/category/{id}/edit', [GalleryController::class, 'categoryedit']);
    Route::post('/category-update', [GalleryController::class, 'categoryupdate']);
    Route::get('/category/{id}', [GalleryController::class, 'categorydelete']);

    Route::get('/category-status', [GalleryController::class, 'categoryStatus']);
    
    Route::get('/gallery', [GalleryController::class, 'index'])->name('admin.gallery');
    Route::post('/gallery', [GalleryController::class, 'store']);
    Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit']);
    Route::post('/gallery-update', [GalleryController::class, 'update']);
    Route::get('/gallery/{id}', [GalleryController::class, 'delete']);

    Route::get('/gallery-status', [GalleryController::class, 'galleryStatus']);

    Route::get('/volunteer', [VolunteerController::class, 'index'])->name('admin.volunteer');
    Route::post('/volunteer', [VolunteerController::class, 'store']);
    Route::get('/volunteer/{id}/edit', [VolunteerController::class, 'edit']);
    Route::post('/volunteer-update', [VolunteerController::class, 'update']);
    Route::get('/volunteer/{id}', [VolunteerController::class, 'delete']);

    
    // active deactive volunteer
    Route::get('active-volunteer', [VolunteerController::class, 'activevolunteer']);

    // get all donation 
    Route::get('/get-all-transaction', [TransactionController::class, 'getAllTransaction'])->name('admin.alltran');

    
    // contributor
    Route::get('/contributor', [ContributorController::class, 'index'])->name('admin.contributor');
    Route::post('/contributor', [ContributorController::class, 'store']);
    Route::get('/contributor/{id}/edit', [ContributorController::class, 'edit']);
    Route::post('/contributor-update', [ContributorController::class, 'update']);
    Route::get('/contributor/{id}', [ContributorController::class, 'delete']);

    // Blog Categories Routes
    Route::get('/blog-categories', [BlogCategoryController::class, 'index'])->name('allBlogCategories');
    Route::post('/blog-categories', [BlogCategoryController::class, 'store']);
    Route::get('/blog-categories/{id}/edit', [BlogCategoryController::class, 'edit']);
    Route::post('/blog-categories-update', [BlogCategoryController::class, 'update']);
    Route::get('/blog-categories/{id}', [BlogCategoryController::class, 'delete']);
    Route::post('/blog-categories/{id}/status', [BlogCategoryController::class, 'updateStatus'])->name('blogCategories.updateStatus');

    Route::get('/blogs', [BlogController::class, 'index'])->name('allBlogs');
    Route::post('/blogs', [BlogController::class, 'store']);
    Route::get('/blogs/{id}/edit', [BlogController::class, 'edit']);
    Route::post('/blogs-update', [BlogController::class, 'update']);
    Route::get('/blogs/{id}', [BlogController::class, 'delete']);
    Route::post('/blogs/{id}/status', [BlogController::class, 'updateStatus'])->name('blogs.updateStatus');

    // Blog Categories Routes
    Route::get('/video-blog-categories', [VideoBlogCategoryController::class, 'index'])->name('allVideoBlogCategories');
    Route::post('/video-blog-categories', [VideoBlogCategoryController::class, 'store']);
    Route::get('/video-blog-categories/{id}/edit', [VideoBlogCategoryController::class, 'edit']);
    Route::post('/video-blog-categories-update', [VideoBlogCategoryController::class, 'update']);
    Route::get('/video-blog-categories/{id}', [VideoBlogCategoryController::class, 'delete']);
    Route::post('/video-blog-categories/{id}/status', [VideoBlogCategoryController::class, 'updateStatus'])->name('blogCategories.updateStatus');

    Route::get('/video-blogs', [VideoBlogController::class, 'index'])->name('allVideoBlogs');
    Route::post('/video-blogs', [VideoBlogController::class, 'store']);
    Route::get('/video-blogs/{id}/edit', [VideoBlogController::class, 'edit']);
    Route::post('/video-blogs-update', [VideoBlogController::class, 'update']);
    Route::get('/video-blogs/{id}', [VideoBlogController::class, 'delete']);
    Route::post('/video-blogs/{id}/status', [VideoBlogController::class, 'updateStatus'])->name('blogs.updateStatus');

    Route::get('/blog/{id}/comments', [BlogController::class, 'viewComments'])->name('blog.comments');

    Route::post('/comment-status/{id}/status', [BlogController::class, 'updateCommentStatus'])->name('comment.updateStatus');

});
//admin part end