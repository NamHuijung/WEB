<?php session_start();?>
<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>로그인_proc</title>
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
            height: 55px;
            font-size: 20pt; font-weight: bold;
            color: rgb(255, 255, 255);
            border: 5px solid black;
            background-color: rgb(0, 40, 63);
        }
    </style>
    <body>
        <?php
        include "db.php";
        
        // 사용자 정보 입력
        $userid = $_REQUEST['userid'];
        $passwd = $_REQUEST['passwd'];

        // 아이디/비밀번호 조회
        $sql = "select * from hj_user 
                where userid = '$userid' and passwd = password('$passwd')";
        $res = mysqli_query($db, $sql);
        if(mysqli_num_rows($res) > 0){
            // 사용자 인증
            $row = mysqli_fetch_array($res);
            $_SESSION['userid'] = $row['userid'];
            $_SESSION['name'] = $row['name'];
            ?>
            <table>
            <tr>
                <td class="head"><?=$row['name']?>님<br>접속을 환영합니다.</td>
            </tr>
            <tr>
                <td align="right" style="height:100px;">
                <a href="board.php"><input class="button" type="button" style="width:250px;" value="게시판으로 이동"></a>
                </td>
            </tr>
        </table>
        <?}
        else{?>
            <table>
            <tr>
                <td class="head">아이디 또는 암호가<br>올바르지 않습니다.</td>
            </tr>
            <tr>
                <td align="right" style="height:100px;">
                    <a href="javascript:history.go(-1);"><input class="button" style="width:150px;" type="button" value="돌아가기">
                </td>
            </tr>
        </table>
        <?}

        // MySQL 서버 접속 종료
        mysqli_close($db);

        ?>
        
    </body>
</html>