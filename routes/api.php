<?php

use App\Http\Controllers\Api\BodyRecord\GraphController;
use App\Http\Controllers\Api\BodyRecord\RecordController;
use App\Http\Controllers\Api\Diary\AddController as DiaryAddController;
use App\Http\Controllers\Api\Diary\ListController as DiaryListController;
use App\Http\Controllers\Api\Exercise\ListController;
use App\Http\Controllers\Api\Exercise\RecordController as ExerciseRecordController;
use App\Http\Controllers\Api\Goal\ProgressController;
use App\Http\Controllers\Api\Goal\SetController;
use App\Http\Controllers\Api\HashTag\AddController as HashTagAddController;
use App\Http\Controllers\Api\HashTag\ListController as HashTagListController;
use App\Http\Controllers\Api\Meal\AddController as MealAddController;
use App\Http\Controllers\Api\Meal\ListController as MealListController;
use App\Http\Controllers\Api\MealType\AddController;
use App\Http\Controllers\Api\MealType\ListController as MealTypeListController;
use App\Http\Controllers\Api\Recommend\AddController as RecommendAddController;
use App\Http\Controllers\Api\Recommend\ListController as RecommendListController;
use App\Http\Controllers\Api\RecommendType\AddController as RecommendTypeAddController;
use App\Http\Controllers\Api\RecommendType\ListController as RecommendTypeListController;
use App\Http\Controllers\Api\User\AuthController;
use App\Http\Controllers\Api\User\LogoutController;
use App\Http\Controllers\Api\User\RegisterController;
use App\Http\Controllers\Api\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::namespace('User')
    ->name('user.')
    ->group(function () {
       Route::post('/login', [AuthController::class, 'index'])->name('login');
       Route::post('/user', [RegisterController::class, 'index'])->name('register');
       Route::middleware("auth:api")->group(function(){
         Route::post('/logout', [LogoutController::class, 'index'])->name('logout');
         Route::get('/user', [UserController::class, 'index'])->name('info');
       });
    });
    Route::middleware("auth:api")->group(function(){
      Route::namespace('BodyRecord')
          ->name('body-record.')
          ->group(function () {
            Route::post('/weight', [RecordController::class, 'index'])->name('weight');
            Route::get('/graph', [GraphController::class, 'index'])->name('graph');
          });
      
      Route::namespace('Exercise')
          ->name('exercise.')
          ->group(function () {
            Route::post('/exercise', [ExerciseRecordController::class, 'index'])->name('record');
            Route::get('/exercise', [ListController::class, 'index'])->name('list');
          });
      
      Route::namespace('Goal')
          ->name('goal.')
          ->prefix('goal')
          ->group(function () {
            Route::post('/', [SetController::class, 'index'])->name('setting');
            Route::get('/progress', [ProgressController::class, 'index'])->name('tracking');
          });
      
      Route::namespace('MealType')
          ->name('mealType.')
          ->prefix('meal/type')
          ->group(function () {
            Route::post('/', [AddController::class, 'index'])->name('add');
            Route::get('/', [MealTypeListController::class, 'index'])->name('list');
          });
      
      Route::namespace('Meal')
          ->name('meal.')
          ->prefix('meal')
          ->group(function () {
            Route::post('/', [MealAddController::class, 'index'])->name('add');
            Route::get('/', [MealListController::class, 'index'])->name('list');
          });
      
      Route::namespace('Diary')
          ->name('diary.')
          ->prefix('diary')
          ->group(function () {
            Route::post('/', [DiaryAddController::class, 'index'])->name('add');
            Route::get('/', [DiaryListController::class, 'index'])->name('list');
          });

      Route::namespace('Diary')
          ->name('diary.')
          ->prefix('diary')
          ->group(function () {
            Route::post('/', [DiaryAddController::class, 'index'])->name('add');
            Route::get('/', [DiaryListController::class, 'index'])->name('list');
          });

      Route::namespace('RecommendType')
          ->name('recommend-type.')
          ->prefix('recommend/type')
          ->group(function () {
            Route::post('/', [RecommendTypeAddController::class, 'index'])->name('add');
            Route::get('/', [RecommendTypeListController::class, 'index'])->name('list');
          });
      
      Route::namespace('HashTag')
          ->name('hashtag.')
          ->prefix('hashtag')
          ->group(function () {
            Route::post('/', [HashTagAddController::class, 'index'])->name('add');
            Route::get('/', [HashTagListController::class, 'index'])->name('list');
          });

      Route::namespace('Recommend')
          ->name('recommend.')
          ->prefix('recommend')
          ->group(function () {
            Route::post('/', [RecommendAddController::class, 'index'])->name('add');
            Route::get('/', [RecommendListController::class, 'index'])->name('list');
          });
    });
