<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiReportController extends Controller
{
    public function reportDetail($id, $board) {
        $arr = [
            'errorcode' => '0'
            ,'msg'      => ''
        ];

        if($board == 'a'){
            $report = DB::select('SELECT * FROM report_lists
            INNER JOIN board_replies
            on board_replies.reply_id = report_lists.reply_id
            INNER JOIN user_infos
            ON user_infos.user_id = report_lists.suspect
            INNER JOIN user_infos dd
            ON dd.user_id = report_lists.reporter
            WHERE report_lists.rep_id = ? AND report_lists.complate_flg = 0', [$id]);
        }else{
            $report = DB::select('SELECT * FROM report_lists
            INNER JOIN boards 
            on boards.board_id = report_lists.board_id
            INNER JOIN user_infos
            ON user_infos.user_id = report_lists.suspect
            INNER JOIN user_infos dd
            ON dd.user_id = report_lists.reporter
            WHERE report_lists.board_id = ? AND report_lists.complate_flg = 0', [$board]);
        }

        if(!$report){
            $arr['errcode'] = '1';
            $arr['msg'] = '데이터 없음';
        }else{
            $arr['errcode'] = '0';
            $arr['msg'] = '성공';
            $arr['data'] = $report;
        }
        

        return $arr;
    }
}
