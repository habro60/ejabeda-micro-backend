<?php

use App\Http\Controllers\AdminviewController;
use App\Http\Controllers\Api\OfficeController;
use App\Http\Controllers\office;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::get('office-tree-view', [office::class, 'manageOffice'])->middleware(['auth','customar'])->name('manageOffice');
Route::post('add-office',[office::class,'addOffice'])->middleware(['auth','customar'])->name('addOffice');
Route::get('get_type_office/{id}', [office::class, 'getOffice'])->middleware(['auth','customar'])->name('getOffice');


// Route::get('category-tree-view',['uses'=>'CategoryController@manageCategory']);
Route::post('add-category',['as'=>'add.category','uses'=>'CategoryController@addCategory']);

Route::get('admindashboard', [AdminviewController::class, 'dashboard'])->name('admindashboard');
Route::get('appsetup', [AdminviewController::class, 'appsetup'])->name('appsetup');
Route::get('officeinfo', [AdminviewController::class, 'officeinfo'])->name('officeinfo');
Route::get('account', [AdminviewController::class, 'account'])->name('account');
Route::get('product', [AdminviewController::class, 'product'])->name('product');

Route::get('/dashboard', function () {
    // $currentDatabase = DB::connection()->getDatabaseName();
    // return $currentDatabase;
    return view('Backend.dashboard');
})->middleware(['auth','customar'])->name('dashboard');

require __DIR__.'/auth.php';
