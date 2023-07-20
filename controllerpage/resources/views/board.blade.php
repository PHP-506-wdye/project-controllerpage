<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <table>
            <tr>
                <th>게시글 번호</th>
                <th>유저 번호</th>
                <th>게시제목</th>
                <th>게시글 내용</th>
                <th>작성일자</th>
            </tr>
            <form action=""></form>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->board_id }}</td>
                <td>{{ $item->user_id }}</td>
                <td>{{ $item->btitle }}</td>
                <td>{{ $item->bcontent }}</td>
                <td>{{ $item->created_at }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>