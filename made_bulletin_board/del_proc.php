<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>삭제_proc</title>
    </head>
    <style>
        table {
            width:600px;
            margin-top: 30px;
            margin-left:auto; 
            margin-right:auto;
        }
        .head{
            width:250px; height:350px;
            font-size: 35pt; 
            text-align: center; 
        }
        .button {
            width:150px; height: 55px;
            font-size: 20pt; font-weight: bold;
            color: rgb(255, 255, 255);
            border: 5px solid black;
            background-color: rgb(0, 40, 63);
        }
    </style>
    <body>
        <?
        // MySQL 서버 접속
        include "db.php";
        
        // 삭제할 글 정보 가져오기
        $idx = $_REQUEST['idx'];

        // SQL 삭제 질의 작성
        $sql = "delete from hj_board
                where idx = $idx";
        // 질의 실행
        $res = mysqli_query($db, $sql);
        if($res){?>
            <table>
            <tr>
                <td class="head">삭제 되었습니다.</td>
            </tr>
            <tr>
                <td align="right">
                <a href="board.php"><input class="button" style="width:250px;"  type="button" value="게시판으로 이동"></a>
                </td>
            </tr>
        </table>
        <?}
        else{?>
            <table>
            <tr>
                <td class="head">삭제 오류 입니다.</td>
            </tr>
            <tr>
                <td align="right">
                    <a href="javascript:history.go(-1);"><input class="button"  type="button" value="돌아가기">
                </td>
            </tr>
        </table>
        <?}

        // MySQL 서버 접속 종료
        mysqli_close($db);
        ?>
    </body>
</html>