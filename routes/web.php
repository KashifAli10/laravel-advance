<?php

use App\Models\Phone;
use App\Models\Client;
use App\Http\Livewire\Posts;
use App\Http\Middleware\checkage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\membercontroller;

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

Route::get('/', function () {
    return view('welcome');
});
//by default resources route created
Route::resource('car','CarController');
// "carindex" url route create when this route hit the cursor goes to controller and index function called

Route::get('carindex',[App\Http\Controllers\CarController::class,'index']);
Route::get('carshow',[CarController::class,'show']);

//useercontroller route
Route::get('user/{id}',[usercontroller::class ,'show']);
//parameter pass
Route::get('userview/{name}',[usercontroller::class ,'parameter']);
//direct route call for view from web page
Route::view('about', 'pages.about');
//this route is for getdata is form action and call the functio in controller
Route::POST('getdata',[usercontroller::class ,'getdata']);

//this route is browser url and return the page user login after submitted the  form data it will go to action get data
Route::view('login', 'pages.userlogin');

//middleware
Route::view('home', 'pages.home');
Route::view('noaccess', 'pages.noAccess');
Route::group(['middleware'=>['protectedpage']],function(){
Route::view('user', 'pages.users');
});

Route::POST('session_login',[usercontroller::class ,'session']);
//this route is browser url and return the page user login after submitted the  form data it will go to action get data
//Route::view('Login', 'pages.session');
//route for login page to Profile page
Route::view('profile_page', 'pages.profile');

//session logout
Route::get('/logout', function () {
    if (session()->has('username'))
    {
        session()->pull('username',null);

    }return redirect('Login');
});
//session login
Route::get('/Login', function () {
    if (session()->has('username'))
    {
        return redirect('profile_page');

    } return view('pages.session');
});

//url for Flash session
Route::post('flashdata',[usercontroller::class ,'flashdata']);

Route::view('flashdata', 'pages.flashdata');

Route::get('index',[usercontroller::class ,'index']);

// add member routes
Route::post('addmember',[usercontroller::class ,'addData']);

Route::view('add', 'pages.addmember');
// delete route [memeber controler]
Route::get('list',[membercontroller::class ,'listfunction']);
Route::get('delete/{id}',[membercontroller::class ,'delete']);
Route::get('edit/{id}',[membercontroller::class ,'showdata']);
Route::post('edit',[membercontroller::class ,'update']);
Route::get('Querylist',[membercontroller::class ,'operation']);
Route::get('aggregatelist',[membercontroller::class ,'operationaggregate']);

//upload image route
Route::post('upload',[membercontroller::class ,'upload']);
Route::view('upload','pages.upload');

// Route for route model binding
Route::get('binding/{id:name}',[usercontroller::class ,'bind']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('post', Posts::class);

//mail Route And function
Route::get('send-mail', function () {
    $details = [

        'title' => 'Mail from wwwGoogle.com',

        'body' => 'This is for testing email using smtp'

    ];
    \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\MyTestMail($details));
    dd("Email is Sent.");

});


Route::get('relation1to1', function ()
{
    $phone = Client::find(1)->phone;
   // dd($phone);

});
Route::get('relation1to1', function ()
{
    //$phone = Client::find(1)->phone;
   // dd($phone);
 return Phone::find(1)->client;
});
