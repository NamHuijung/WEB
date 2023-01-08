<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>회원가입_proc</title>
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
        <?
        // MySQL 서버 접속
        include "db.php";
        
        // 사용자 정보 입력
        $userid = $_REQUEST['userid'];
        $passwd = $_REQUEST['passwd'];
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];

        // 아이디 중복 조회
        $sql = "select * from hj_user where userid = '$userid'";
        $res = mysqli_query($db, $sql);
        if(mysqli_num_rows($res) > 0){?>
            <table>
                <tr>
                    <td class="head" style="font-size:25pt;">이미 사용중인 아이디 입니다.</td>
                </tr>
                <tr>
                    <td align="right">
                        <a href="javascript:history.go(-1);"><input class="button" style="width:150px;" type="button" value="돌아가기">
                    </td>
                </tr>
            </table>
            <?exit(0);
        } 

        // SQL 입력 질의 작성
        $sql = "insert into hj_user values('$userid', password('$passwd'), '$name', '$email', now())";
        // 질의 실행
        $res = mysqli_query($db, $sql);
        if($res){?>
            <table>
            <tr>
                <td class="head">가입되었습니다.</td>
            </tr>
            <tr>
                <td align="right">
                    <a href="login_form.php"><input class="button" style="width:300px;" type="button" value="로그인 페이지 이동">
                </td>
            </tr>
        </table>
        <?}
        else{?>
            <table>
            <tr>
                <td class="head">가입 오류 입니다.</td>
            </tr>
            <tr>
                <td align="right">
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