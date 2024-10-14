<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;


Route::get('/',[AdminController::class,'home']);




route::get('/home',[AdminController::class,'index'])->name('home')
->middleware(['auth','admin']);

Route::get('/create_room',[AdminController::class,'create_room'])
->middleware(['auth','admin']);

Route::post('/add_room',[AdminController::class,'add_room'])
->middleware(['auth','admin']);
route::get('view_rooms',[AdminController::class,'view_rooms'])
->middleware(['auth','admin']);
route::get('delete_rooms/{id}',[AdminController::class,'delete_rooms'])
->middleware(['auth','admin']);
Route::get('edit_rooms/{id}',[AdminController::class,'edit_rooms'])
->middleware(['auth','admin']);
Route::post('update_rooms/{id}',[AdminController::class,'update_rooms'])
->middleware(['auth','admin']);
Route::get('room_details/{id}',[HomeController::class,'room_details']);
Route::post('add_booking/{id}',[HomeController::class,'add_booking']);

Route::get('bookings', [AdminController::class, 'bookings'])
->middleware(['auth','admin']);;
   

Route::get('delete_booking/{id}',[AdminController::class,'delete_booking'])
->middleware(['auth','admin']);

Route::get('approve_book/{id}',[AdminController::class,'approve_book'])
->middleware(['auth','admin']);
Route::get('reject_book/{id}',[AdminController::class,'reject_book'])
->middleware(['auth','admin']);

Route::get('view_gallery',[AdminController::class,'view_gallery'])
->middleware(['auth','admin']);
Route::post('upload_gallery',[AdminController::class,'upload_gallery'])
->middleware(['auth','admin']);
Route::get('delete_gallery/{id}',[AdminController::class,'delete_gallery'])
->middleware(['auth','admin']);

Route::post('contact',[HomeController::class,'contact']);
Route::get('all_message',[AdminController::class,'all_message'])
->middleware(['auth','admin']);

Route::get('send_mail/{id}',[AdminController::class,'send_mail'])
->middleware(['auth','admin']);

Route::post('mail/{id}',[AdminController::class,'mail'])
->middleware(['auth','admin']);

Route::get('our_rooms',[HomeController::class,'our_rooms']);

Route::get('hotel_gallery',[HomeController::class,'hotel_gallery']);

Route::get('contact_us',[HomeController::class,'contact_us']);
