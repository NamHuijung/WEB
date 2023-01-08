<?
    // MySQL 서버 접속
    $db = mysqli_connect('localhost', 'syaic04', 'syaic0404');
    if(!$db){
        echo "DBMS 접속 오류<br>";
        exit(0);
    }

    // 작업 DB 선택
    if(!mysqli_select_db($db, 'syaic04')){
        echo "DB 선택 오류<br>";
        exit(0);
    }
?>