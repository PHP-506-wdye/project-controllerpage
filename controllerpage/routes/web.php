<?php

use App\Http\Controllers\ReportController;
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

// Route::get('/', function () {
//     return view('index');
// });


// ---------------------------------------------
// 섹션명       : 댓글관리
// 기능         : 댓글 관리 라우트 설정
// 관리자       : 박상준
// 생성일       : 2023-07-20
// 라우트수      : 총 
// ---------------------------------------------
use App\Http\Controllers\writeController;

Route::get('/comment/commentlist', [writeController::class, 'commentlist'])->name('comment.commentlist');
Route::post('/comment/commentdel',[writeController::class, 'commentdel'])->name('comment.commentdel');

Route::get('/board/boardlist', [writeController::class, 'boardlist'])->name('comment.commentlist');

// ---------------------------------------------
// 섹션명       : 게시글, 댓글 신고 
// 기능         : 게시글, 댓글 신고 관련 라우트 설정
// 관리자       : 채수지
// 생성일       : 2023-07-20
// ---------------------------------------------
Route::get('/report', [ReportController::class, 'returnview']);