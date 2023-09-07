<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
    //return "Hello";
})->name('main-page');

Route::get('/test/{value}', function ($value) {
    //return "Test";
    return view('test', compact('value')); // ['value'=> $value]
});

//Route::get('/staff/{id}', function($id){
//$staffs = Staff::orderBy('tag','asc') -> take(2) ->get();        //select * from staffs //amik data 2 je
//$staffs = Staff::all();                                          // select * from staffs
//$staffs = Staff::find($id);
//$staffs = Staff::findOrFail($id);
//$staffs = Staff::where('user_id','=', $id) ->firstOrFail();      //first user sahaja sebab guna firstorfail
//$staffs = Staff::where('user_id','=', $id) ->count();             //kira berapa count
//$staffs = Staff::max('tag');                                       //amik value latest *boleh guna min juga amik paling awal
//$staffs = Staff::select('id','tag')->get();  
//$staffs = Staff::with('users')->get();                          //inerjoin nak joinkan data table
//$staffs = Staff::whereHas('users')->get();
//$staffs = Staff::whereNotNull('user_id')->get();

//return view ('staff', compact ('staffs'));                      //logical laravel
//});

Route::get('/staff', [StaffController::class, 'index'])->name('staff');    //name tu create link rather than yg panjang panjang

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/item', [ItemController::class, 'index'])->name('item');
Route::get('/item/create', [ItemController::class, 'create'])->name('item.create'); //panggil page create
Route::post('/item/store', [ItemController::class, 'store'])->name('item.store'); //simpan data
Route::get('/item/show/{id}', [ItemController::class, 'show'])->name('item.show');
Route::get('/item/edit/{id}', [ItemController::class, 'edit'])->name('item.edit');
Route::post('/item/update/{id}', [ItemController::class, 'update'])->name('item.update');
Route::post('/item/destroy/{id}', [ItemController::class, 'destroy'])->name('item.destroy');
Route::post('/item/restore/{id}', [ItemController::class, 'restore'])->name('item.restore');
Route::get('/report', [ReportController::class, 'index'])->name('report');
