<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\projectsController;
use App\Http\Controllers\developersPagesController;
use App\Http\Controllers\NotificationsController;

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




Route::middleware(['auth', 'checkAdmin:admin'])
    //->prefix('admin')
    ->group(function () {
        //project resource
        //   Route::get('/', [projectsController::class, 'index'])->name("home");
        Route::get("/projects", [projectsController::class, 'index'])->name('index');
        Route::get("/projects/create", [projectsController::class, 'create'])->name('create');
        Route::post("/projects/store", [projectsController::class, 'store'])->name('store');
        Route::get("/projects/edit/{id}", [projectsController::class, 'edit'])->name('edit');
        Route::put("/projects/update/{id}", [projectsController::class, 'update'])->name('update');
        Route::delete("/projects/delete/{id}", [projectsController::class, 'destroy'])->name('delete');
        Route::get("/projects/show/{id}", [projectsController::class, 'show'])->name('show');
        //trash,restore,forceDelete
        Route::get('/projects/trash', [projectsController::class, 'trash'])->name('trash');
        Route::put('/projects/restore/{id}', [projectsController::class, 'restore'])->name('restore');
        Route::delete('/projects/forcedelete/{id}', [projectsController::class, 'forceDelete'])->name('forcedelete');
    });
Route::middleware(['auth'])->group(function () {
    //Pages Developer
    Route::get('/', [developersPagesController::class, 'index'])->name('home');
    Route::get('/myProjects', [developersPagesController::class, 'myProjects'])->name('developersPages.myProjects');
    //complete Project and cancle complete Project 
    Route::post('/completeProject/{id}', [developersPagesController::class, 'completeProject'])->name('complete');
    Route::post('/cancelCompleteProject/{id}', [developersPagesController::class, 'cancelCompleteProject'])->name('cancelComplete');
    //forceAdminComplete && forceAdminCancel for admin
    Route::post('/forceCompleteProject/{id}', [developersPagesController::class, 'forceCompleteProject'])->name('forceAdminComplete');
    Route::post('/forceCancelCompleteProject/{id}', [developersPagesController::class, 'forceCancelCompleteProject'])->name('forceAdminCancel');
    //notification
    Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
