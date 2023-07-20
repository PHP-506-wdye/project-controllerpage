<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\BoardReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class writeController extends Controller
{
    public function commentlist(){
        $comment = BoardReply::select('reply_id','user_id','board_id','rcontent','created_at','updated_at')
                                ->whereNull('deleted_at')->get();

        return view('comment')->with('data', $comment);
    }

    public function commentdel(Request $req){

    }


    public function boardlist(){
        $board = Board::select('board_id','user_id','btitle','bcontent','created_at','updated_at')->whereNull('deleted_at')->get();;
        return view('board')->with('data', $board);
    }
}
