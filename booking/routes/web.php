<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientPagesController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StripeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Client pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [CustomAuthController::class, 'get_login'])->name('login');
Route::get('/register', [CustomAuthController::class, 'get_register'])->name('register');
Route::get('/forgotPassword', [CustomAuthController::class, 'forgot_password'])->name('forgotPassword');
Route::get('/account', [CustomAuthController::class, 'get_account'])->name('account');
Route::get('/db', [ClientPagesController::class, 'db_test'])->name('db_test');
Route::get('/terms', [ClientPagesController::class, 'get_terms'])->name('terms');
Route::get('/room/{id}', [ClientPagesController::class, 'get_room'])->name('room');
Route::get('/checkout', [ClientPagesController::class, 'get_checkout'])->name('checkout');
Route::post('/checkout/set', [ClientPagesController::class, 'set_checkout_params'])->name('set-checkout-post');
Route::post('/search', [ClientPagesController::class, 'get_search'])->name('search');
Route::post('/account/update', [ClientPagesController::class, 'save_client_data'])->name('update-client');
Route::post('/checkout/make', [ClientPagesController::class, 'create_reservation'])->name('make-reservation');
Route::get('/finalise', [ClientPagesController::class, 'finalise_reservation'])->name('clear-reservation-cache');
Route::post('/account/delete', [ClientPagesController::class, 'delete_account'])->name('del-current-account');
Route::post('stripe', [StripeController::class, 'store'])->name('stripe.store');
Route::post('/save-testimonial', [ClientPagesController::class, 'save_testimonial'])->name('save-testimonial');
Route::post('/account/change-picture', [ClientPagesController::class, 'change_prof_picture'])->name('change-prof-picture');

//Auth
Route::post('login',[CustomAuthController::class,'process_login'])->name('loginPost');
Route::post('register',[CustomAuthController::class,'process_register'])->name('registerPost');
Route::post('logout', [CustomAuthController::class, 'logout'])->name('logout');
Route::get('/manlogout', [CustomAuthController::class, 'manual_logout'])->name('manual-logout');

//Admin
Route::get('/admin', [AdminController::class, 'get_admin_dashboard'])->name('admin-home');
Route::get('/admin/users', [AdminController::class, 'get_users_page'])->name('admin-users');
Route::get('/admin/users/{id}', [AdminController::class, 'get_users_edit_page'])->name('admin-users-edit');
Route::post('/admin/users/update/{id}', [AdminController::class, 'edit_user'])->name('admin-edit-user-post');
Route::get('/admin/rooms', [AdminController::class, 'get_rooms_page'])->name('admin-rooms');
Route::get('/admin/add-room', [AdminController::class, 'get_new_room_page'])->name('admin-add-room');
Route::post('/admin/add-room/add', [AdminController::class, 'add_room'])->name('admin-add-room-post');
Route::get('/admin/rooms/{id}', [AdminController::class, 'get_room_edit_page'])->name('admin-rooms-edit');
Route::post('/admin/rooms/update/{id}', [AdminController::class, 'edit_room'])->name('admin-edit-room-post');
Route::get('/admin/roomtypes/{id}', [AdminController::class, 'get_roomtype_edit_page'])->name('admin-roomtype-edit');
Route::post('/admin/roomtypes/update/{id}', [AdminController::class, 'edit_roomtype'])->name('admin-edit-roomtype-post');
Route::get('/admin/add-roomtype', [AdminController::class, 'get_add_new_roomtype_page'])->name('admin-add-roomtype');
Route::post('/admin/add-roomtype/add', [AdminController::class, 'add_roomtype'])->name('admin-add-roomtype-post');
Route::get('/admin/bookings', [AdminController::class, 'get_bookings_page'])->name('admin-bookings');
Route::get('/admin/facilities', [AdminController::class, 'get_packages_page'])->name('admin-facilities');
Route::post('/admin/new-facility', [AdminController::class, 'add_facility'])->name('admin-add-facility');
Route::post('/admin/facilities/update/{id}', [AdminController::class, 'update_facility'])->name('admin-update-facility');
Route::get('/admin/specials', [AdminController::class, 'get_specials_page'])->name('admin-specials');
Route::get('/admin/add-special', [AdminController::class, 'get_add_special_page'])->name('admin-add-special');
Route::post('/admin/add-new-special', [AdminController::class, 'add_special'])->name('admin-add-special-post');
Route::get('/admin/specials/{id}', [AdminController::class, 'get_edit_special_page'])->name('admin-edit-special');
Route::post('/admin/specials/update/{id}', [AdminController::class, 'edit_special'])->name('admin-edit-special-post');
Route::get('/admin/reservation/{id}', [AdminController::class, 'get_edit_reservation_page'])->name('admin-edit-reservation');
Route::post('/admin/update-reservation/{id}', [AdminController::class, 'update_reservation'])->name('admin-edit-reservation-post');
Route::get('/admin/add-reservation', [AdminController::class, 'get_add_reservation_page'])->name('admin-add-reservation');
Route::post('/admin/add-new-reservation', [AdminController::class, 'add_reservation'])->name('admin-add-reservation-post');


Route::post('/admin/facility-room-add', [AdminController::class, 'add_facility_to_room'])->name('admin-add-facility-to-room');
Route::post('/admin/facility-room-remove', [AdminController::class, 'remove_facility_from_room'])->name('admin-remove-facility-from-room');

//PDF

Route::get('/pdf-download/{id}', [AdminController::class, 'downloadPDF'])->name('admin-pdf-generation');
