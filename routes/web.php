<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;


Route::get('/', function () {
	if (Auth::check()) {
		return redirect()->to('/dashboard');
	}else{
    	return view('home');
	}
});

Route::get('/register', function () {
	if (Auth::check()) {
		return redirect()->to('/dashboard');
	}else{
    	return view('register');
	}
});

Route::get('/logout', function () {
	Auth::logout();
    Session::flush();
    return view('home');
});

Route::post('/checklogin', [HomeController::class, 'userLogin'])->name('checklogin');
Route::post('/signup', [HomeController::class, 'userRegister'])->name('signup');


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/superdash', function () {
    return view('dashboard');
})->name('superdash');

Route::get('/admindash', function () {
    return view('dashboard');
})->name('admindash');

Route::get('/manageuser', [HomeController::class, 'manageUser'])->name('manageuser');

Route::post('/addbal', [HomeController::class, 'addWallet'])->name('addbal');

Route::post('clickmodal', [HomeController::class, 'clickmodal'])->name('clickmodal');