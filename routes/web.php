<?php

use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\departmentController;
use App\Http\Controllers\admin\supplierController;
use App\Http\Controllers\admin\depotController;
use App\Http\Controllers\admin\deviceController;
use App\Http\Controllers\admin\homeController;
use App\Http\Controllers\admin\loginController;
use App\Http\Controllers\admin\userController;
use App\Http\Controllers\admin\statusController;
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

Route::prefix('admin')->group(function(){
    Route::get('login', [loginController::class, 'login'])->name('admin.login.index');
    Route::post('login', [loginController::class, 'checkLogin'])->name('admin.login.checkLogin');
});

Route::prefix('admin')->group(function(){
    Route::get('register', [loginController::class, 'showFormRegister'])->name('admin.showFormRegister');
    Route::post('register', [loginController::class, 'register'])->name('admin.register');

});

Route::prefix('admin')->middleware('admin.login')->group(function(){
    Route::get('logout', [loginController::class, 'logout'])->name('admin.logout');
    Route::get('profile', [loginController::class, 'profile'])->name('admin.login.profile');
    Route::put('profile', [loginController::class, 'updateProfile'])->name('admin.profile.update');

    Route::prefix('category')->group(function(){
        Route::get('', [categoryController::class, 'index'])->name('admin.category.index');
        Route::get('create', [categoryController::class, 'create'])->name('admin.category.create');
        Route::post('store', [categoryController::class, 'store'])->name('admin.category.store');
        Route::get('edit/{id}', [categoryController::class, 'edit'])->name('admin.category.edit');
        Route::put('update/{id}', [categoryController::class, 'update'])->name('admin.category.update');
        Route::get('delete/{id}', [categoryController::class, 'delete'])->name('admin.category.delete');
    });

    Route::prefix('action')->group(function(){
        Route::prefix('department')->group(function(){
            Route::get('', [departmentController::class, 'index'])->name('admin.action.department.index');
            Route::get('create', [departmentController::class, 'create'])->name('admin.action.department.create');
            Route::post('store', [departmentController::class, 'store'])->name('admin.action.department.store');
            Route::get('edit/{id}', [departmentController::class, 'edit'])->name('admin.action.department.edit');
            Route::put('update/{id}', [departmentController::class, 'update'])->name('admin.action.department.update');
            Route::get('delete/{id}', [departmentController::class, 'delete'])->name('admin.action.department.delete');
            
            Route::get('list', [departmentController::class, 'listDepartment'])->name('admin.department.listDepartment');
            
            Route::get('add-device-department', [departmentController::class, 'formAddDevice'])->name('admin.action.department.get.add.device');
            // Route::get('add-device-department-{id}', [departmentController::class, 'formAddDevice'])->name('admin.action.department.get.add.device');
            Route::post('add-device-department', [departmentController::class, 'addDevice'])->name('admin.action.department.get.post.device');
            Route::get('delete-device-department/{id}', [departmentController::class, 'deleteDevice'])->name('admin.action.department.deleteDevice');
            Route::get('/{id}', [departmentController::class, 'show'])->name('admin.department.show');
            // Route::post('add-device-department-{id}', [departmentController::class, 'addDevice'])->name('admin.action.department.get.post.device');
        });

        Route::prefix('depot')->group(function(){
            Route::get('', [depotController::class, 'index'])->name('admin.action.depot.index');
            Route::get('create', [depotController::class, 'create'])->name('admin.action.depot.create');
            Route::post('store', [depotController::class, 'store'])->name('admin.action.depot.store');
            Route::get('edit/{id}', [depotController::class, 'edit'])->name('admin.action.depot.edit');
            Route::put('update/{id}', [depotController::class, 'update'])->name('admin.action.depot.update');
            Route::get('delete/{id}', [depotController::class, 'delete'])->name('admin.action.depot.delete');
        });

        Route::prefix('supplier')->group(function(){
            Route::get('', [supplierController::class, 'index'])->name('admin.action.supplier.index');
            Route::get('create', [supplierController::class, 'create'])->name('admin.action.supplier.create');
            Route::post('store', [supplierController::class, 'store'])->name('admin.action.supplier.store');
            Route::get('edit/{id}', [supplierController::class, 'edit'])->name('admin.action.supplier.edit');
            Route::put('update/{id}', [supplierController::class, 'update'])->name('admin.action.supplier.update');
            Route::get('delete/{id}', [supplierController::class, 'delete'])->name('admin.action.supplier.delete');
        });
    });


    Route::prefix('device')->group(function(){
        Route::get('', [deviceController::class, 'index'])->name('admin.device.index');
        Route::get('create', [deviceController::class, 'create'])->name('admin.device.create');
        Route::post('store', [deviceController::class, 'store'])->name('admin.device.store');
        Route::get('edit/{id}', [deviceController::class, 'edit'])->name('admin.device.edit');
        Route::put('update/{id}', [deviceController::class, 'update'])->name('admin.device.update');
        Route::get('delete/{id}', [deviceController::class, 'delete'])->name('admin.device.delete');
        
    });

    Route::prefix('status')->group(function(){
        Route::get('', [statusController::class, 'index'])->name('admin.status.index');
        Route::get('create', [statusController::class, 'create'])->name('admin.status.create');
        Route::post('store', [statusController::class, 'store'])->name('admin.status.store');
        Route::get('edit/{id}', [statusController::class, 'edit'])->name('admin.status.edit');
        Route::put('update/{id}', [statusController::class, 'update'])->name('admin.status.update');
        Route::get('delete/{id}', [statusController::class, 'delete'])->name('admin.status.delete');
    });

    Route::prefix('home')->group(function(){
        Route::get('', [homeController::class, 'index'])->name('admin.home.index');
        
    });

    

    Route::prefix('user')->group(function(){
        Route::get('', [userController::class, 'index'])->name('admin.user.index');
        Route::get('create', [userController::class, 'create'])->name('admin.user.create');
        Route::post('store', [userController::class, 'store'])->name('admin.user.store');
        Route::get('edit/{id}', [userController::class, 'edit'])->name('admin.user.edit');
        Route::put('update/{id}', [userController::class, 'update'])->name('admin.user.update');
        Route::get('delete/{id}', [userController::class, 'delete'])->name('admin.user.delete');
    });

});
