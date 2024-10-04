<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\TransaksiController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

//login
Route::group(['middleware'=>['Auth','checkRole:admin']], function(){});
  Route::get('/index',[AuthController::class,'index']);
  Route::post('/cek_login',[AuthController::class,'cek_login']);
  Route::get('/Logout',[AuthController::class,'Logout']);

//Crud data user
Route::get('/user',[UserController::class,'home']);
Route::post('/user/store',[UserController::class,'store']);
Route::post('/user/update/{id}',[UserController::class,'update']);
Route::get('/user/destroy/{id}',[UserController::class,'destroy']);

//Crud Jenis Brang
Route::get('/JenisBarang',[JenisBarangController::class,'home']);
Route::post('/JenisBarang/store',[JenisBarangController::class,'store']);
Route::post('/JenisBarang/update/{id}',[JenisBarangController::class,'update']);
Route::get('/JenisBarang/destroy/{id}',[JenisBarangController::class,'destroy']);

//Crud Data Brang
Route::get('/barang',[BarangController::class,'home']);
Route::post('/barang/store',[BarangController::class,'store']);
Route::post('/barang/update/{id}',[BarangController::class,'update']);
Route::get('/barang/destroy/{id}',[BarangController::class,'destroy']);

//setting diskon
Route::get('/diskon',[DiskonController::class,'home']);
Route::post('/diskon/update/{id}',[DiskonController::class,'update']);

//transaksi
Route::get('/transaksi',[TransaksiController::class,'home']);
Route::get('/transaksi/create',[TransaksiController::class,'create']);


Route::get('/', [HomeController::class, 'home']); // Menambahkan route untuk /
Route::get('/home', [HomeController::class, 'home']); // Route yang sudah ada
