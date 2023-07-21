<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ReportController extends Controller
{
    // todo : user_infos > report_num increment sql 추가
    
    public function returnview() {
        // todo : 댓글, 게시글 페이지 나누기 

        // 신고인 user_id, name, 피신고인 user_id, name 및 피신고인의 신고받은 횟수 정보 / 신고사유 / 신고일, 신고 현황
        $reportinfo = DB::select('SELECT 
        rp.rep_id, rp.board_id, rp.reply_id, rp.reporter, rp.suspect, ui2.report_num, rr.rep_flg, rr.rep_r_content, rp.complate_flg, rp.created_at
        FROM report_lists rp
        LEFT JOIN user_infos ui1
        ON rp.reporter = ui1.user_id
        LEFT JOIN user_infos ui2
        ON rp.suspect = ui2.user_id
        INNER JOIN report_reasons rr
        ON rr.rep_r_id = rp.rep_r_id
        WHERE rp.complate_flg = 0');

        return view('report')
        ->with('report_info', $reportinfo);
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
