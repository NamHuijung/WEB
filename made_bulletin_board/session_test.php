<?php session_start();?>
<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>로그인</title>
    </head>
    <body>
        <h1>session 확인</h1>
        <?php
            echo "현재 접속한 아이디 : ".$_SESSION['userid']."<br>";
            echo "현재 접속한 아이디 : ".$_SESSION['name']."<br>";
        ?>
    </body>
</html>