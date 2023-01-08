<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>수정</title>
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
        
        // 사용자 정보 입력
        $idx = $_REQUEST['idx'];
        $title = $_REQUEST['title'];
        $content = $_REQUEST['content'];

        // SQL 수정 질의 작성
        $sql = "update hj_board set title='$title', content='$content'
                where idx = $idx";
        // 질의 실행
        $res = mysqli_query($db, $sql);
        if($res){
            header("Location:board.php");
        }
        else{?>
            <table>
            <tr>
                <td class="head">수정 오류 입니다.</td>
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