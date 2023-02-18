<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryGamesController;


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

Route::get('/', [TaskController::class, 'listLimit']);
Route::get('/show/{task}', [TaskController::class,'show'])->name('task.show');
Route::get('/showgame/{games}', [GamesController::class,'show'])->name('games.show');

Route::get('/news', [CategoryController::class, 'listMeny']);
Route::get('/games', [CategoryGamesController::class, 'listMeny']);
Route::get('/categorynews/{category}', [CategoryController::class, 'newsByCategory']);

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

Route::post('/newssort', [CategoryController::class, 'sorting']);

Route::post('/gamessort', [CategoryGamesController::class, 'sorting']);
Route::post('/categorygamessort/{categoryGame}', [CategoryGamesController::class, 'gameByCategorySorting']);

Route::post('/categorygamessort/{categoryGame', [CategoryGamesController::class, 'gameByCategorySorting']);

Route::post('/newssearch', [CategoryController::class, 'search']);

// Route::get('/', function () {
//     return view('startMainPage');  //это форма логин
// });
//-----------------------------------------------
Route::group(['middleware'=>['auth']], function() {

    Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');

    Route::middleware('manager')->group(function() {
        //------------------------------ Category list CRUD
        Route::get('/categorylist', [CategoryController::class, 'index']);
        Route::get('/addcategory', [CategoryController::class, 'create']);
        Route::post('/addcategory', [CategoryController::class, 'store']);

        Route::get('/categorygamelist', [CategoryGamesController::class, 'index']);
        Route::get('/addcategorygame', [CategoryGamesController::class, 'create']);
        Route::post('/addcategorygame', [CategoryGamesController::class, 'store']);

        Route::delete('/deletecategory/{category}', [CategoryController::class, 'destroy']);

        //------------------------------ Task list CRUD
        //список - вывод на страницу - get
        Route::get('productlist', [TaskController::class, 'index']);
        //обработка данных формы - выбор категории - post
        Route::post('/productByCategory', [TaskController::class, 'taskByCategory']);


        Route::get('/addtask', [TaskController::class, 'create']);
        Route::post('/addtask', [TaskController::class, 'store']);

        Route::get('/edittask/{task}', [TaskController::class, 'edit']);
        Route::post('/edittask/{task}', [TaskController::class, 'update']);

        Route::get('/deletetask/{task}', [TaskController::class, 'delete']);
        Route::post('/deletetask/{task}', [TaskController::class, 'destroy']);

        //Comments List 
        Route::get('/commentslist', [CommentController::class, 'index']);
        Route::delete('/deletecomment/{comment}', [CommentController::class, 'destroy']);
        //Games list CRUD
        //список - вывод на страницу - get
        Route::get('/gamelist', [GamesController::class, 'index']);
        //обработка данных формы - выбор категории - post
        Route::post('/gameByCategory', [GamesController::class, 'gameByCategory']);

        Route::get('/addgames', [GamesController::class, 'create']);
        Route::post('/addgames', [GamesController::class, 'store']);

        Route::get('/editgame/{games}', [GamesController::class, 'edit']);
        Route::post('/editgame/{games}', [GamesController::class, 'update']);
        Route::get('/deletegame/{games}', [GamesController::class, 'delete']);
        Route::post('/deletegame/{games}', [GamesController::class, 'destroy']);
    });

    Route::middleware('admin')->group(function() {
        //---------------------------------- User list CRUD
        Route::get('users', [UserController::class, 'index']);
        Route::post('/userByRole', [UserController::class, 'userByrole']);

        Route::get('/adduser', [UserController::class, 'create']);
        Route::post('/adduser', [UserController::class, 'store']);
    });

    Route::get('/profile/{user}', [UserController::class,'edit']); //редактирование профиля для юзера
    Route::post('/profile/{user}', [UserController::class,'update']);

    Route::get('/edituser/{user}', [UserController::class, 'edit']);
    Route::post('/edituser/{user}', [UserController::class, 'update']);

});


//-------------login
Route::get('/login', [AuthController::class, 'login'])->name('login');//вывод
Route::post('/login', [AuthController::class, 'authenticate']); // обработка формы
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'userStore']);





//Route::post('todoCheck/{todo}', [TodoController::class, 'chekDone']);