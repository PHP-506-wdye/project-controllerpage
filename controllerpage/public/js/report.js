function detailReport(id, board) {
    console.log(id)
    console.log(board)
    if (!board) {
        board = 'a';
        console.log(board);
    }
    fetch(`/api/reportdetail/${id}/${board}`, {
        method: "get"
    })
    .then(res => res.json())
    .then(data => { 

        console.log(data); console.log(data.errcode); console.log(data.msg)
        data['data'].forEach(rep => {
            let reporter = document.getElementById('reporter');
            let suspect = document.getElementById('suspect');
            let report_con = document.getElementById('report_con');
            let report_com = document.getElementById('report_com');
            let report_date = document.getElementById('report_date');

            if(rep.reply_id !== null){
                // 신고당한 댓글 정보
                report_con.innerHTML = '댓글 ID : ' + rep.reply_id
                + '<br> 댓글 내용 : ' 
                + rep.rcontent
            }else{
                // 신고당한 게시판 정보
                report_con.innerHTML = '게시판 ID : ' + rep.board_id 
                + '<br> 게시판 제목 : ' 
                + rep.btitle + ' <br> 게시판 내용 : ' + rep.bcontent
                
            }
        });
    });
}