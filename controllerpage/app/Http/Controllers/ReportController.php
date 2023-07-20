<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    // todo : user_infos > report_num increment sql 추가
    
    public function returnview() {
        // todo : 신고사유, 피신고인, 신고인, 신고일, 신고현황, 피신고인의 신고 받은 횟수 출력
        // todo : 댓글, 게시글 페이지 나누기

        // 신고일, 신고현황 정보 획득
        $reportinfo = DB::table('report_lists')
        ->select('complate_flg', 'created_at')
        ->where('complate_flg', '0')
        ->get();

        // 신고인, 피신고인의 user_id, name 및 피신고인의 신고받은 횟수 정보 획득
        $userinfo = DB::select('SELECT rp.reporter, ui1.user_name, rp.suspect, ui2.user_name, ui2.report_num
        FROM report_lists rp
        LEFT JOIN user_infos ui1
        ON rp.reporter = ui1.user_id
        LEFT JOIN user_infos ui2
        ON rp.suspect = ui2.user_id
        WHERE rp.complate_flg = 0');

        $postAreply = DB::table('report_lists')
        ->select('boards.board_id', 'boards.btitle', 'board_replies.reply_id', 'board_replies.rcontent')
        ->join('boards', 'boards.board_id', 'report_lists.board_id')
        ->join('board_replies', 'board_replies.reply_id', 'report_lists.reply_id')
        ->where('report_lists.complate_flg', '0')
        ->get();

        var_dump($reportinfo);
        exit;

        return view('report');
    }

    // 신고가 들어온 게시물 검토 후 삭제 또는 철회
    public function ReportPost() {
        // $reportPost = ReportList::select('');
    }

    // 신고가 들어온 댓글 검토 후 삭제 또는 철회
    public function ReportReply() {
        
    }

    // 신고 받은 횟수가 누적 5회일 경우 유저 상태를 정지된 회원으로 변경 및 정지된 회원의 게시물, 댓글 삭제
    public function stopUser() {

    }
}
