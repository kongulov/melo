<?php

use App\Http\Controllers\Api\{AuthController, PermissionController, PostController, RoleController};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');

    Route::middleware('auth:api')->group(function(){
        Route::get('/me', 'me');
        Route::get('/logout', 'logout');
        Route::post('/refresh', 'refresh');
    });
});
Route::middleware('auth:api')->group(function(){
    Route::prefix('/roles')->group(function (){
        Route::get('/', [RoleController::class, 'list']);
        Route::post('/', [RoleController::class, 'create']);
        Route::get('/{roleId}', [RoleController::class, 'findById'])->where(['roleId' => '[0-9]+']);
        Route::put('/{roleId}', [RoleController::class, 'update'])->where(['roleId' => '[0-9]+']);
        Route::delete('/{roleId}', [RoleController::class, 'delete'])->where(['roleId' => '[0-9]+']);

        Route::get('/{roleId}/permission/{permissionId}/attach', [RoleController::class, 'attachPermission'])
            ->where(['roleId' => '[0-9]+', 'permissionId' => '[0-9]+']);
        Route::get('/{roleId}/permission/{userId}/detach', [RoleController::class, 'detachPermission'])
            ->where(['roleId' => '[0-9]+', 'userId' => '[0-9]+']);
        Route::get('/{roleId}/user/{userId}/attach', [RoleController::class, 'attachUser'])
            ->where(['roleId' => '[0-9]+', 'userId' => '[0-9]+']);
        Route::get('/{roleId}/user/{userId}/detach', [RoleController::class, 'detachUser'])
            ->where(['roleId' => '[0-9]+', 'userId' => '[0-9]+']);
    });

    Route::prefix('/permissions')->group(function (){
        Route::get('/', [PermissionController::class, 'list']);
        Route::post('/', [PermissionController::class, 'create']);
        Route::get('/{permissionId}', [PermissionController::class, 'findById'])->where(['permissionId' => '[0-9]+']);
        Route::put('/{permissionId}', [PermissionController::class, 'update'])->where(['permissionId' => '[0-9]+']);
        Route::delete('/{permissionId}', [PermissionController::class, 'delete'])->where(['permissionId' => '[0-9]+']);
    });

    Route::prefix('/posts')->group(function (){
        Route::get('/', [PostController::class, 'list']);
        Route::post('/', [PostController::class, 'create']);
        Route::get('/{postId}', [PostController::class, 'findById'])->where(['postId' => '[0-9]+']);
        Route::put('/{postId}', [PostController::class, 'update'])->where(['postId' => '[0-9]+']);
        Route::delete('/{postId}', [PostController::class, 'delete'])->where(['postId' => '[0-9]+']);
    });
});

