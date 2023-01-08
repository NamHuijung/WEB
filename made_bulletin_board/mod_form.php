<?php session_start();?>
<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>글수정</title>
    </head>
    <style>
        table {
            width:900px;
            margin-top: 30px;
            margin-left:auto; 
            margin-right:auto;
        }
        .title{
            height: 110px;
            font-size: 30pt; font-weight: bold;
            text-align: center;
            color: rgb(255, 255, 255);
            background-color: rgb(0, 40, 63);
        }
        th {
            width:200px; height: 70px;
            font-size: 20pt;
            text-align: center; 
        }
        .button {
            width:100px; height: 45px;
            font-size: 15pt; font-weight: bold;
            border: 5px solid black;
            color: rgb(255, 255, 255);
            background-color: rgb(0, 40, 63);
        }
    </style>
    <body>
        <? 
        include "db.php";
        $idx = $_GET['idx'];

        # 해당 글 조회
        $sql = "select * from hj_board
                where idx = $idx";
        $res = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($res);
        ?>
        <form name="mod" action="mod_proc.php" method="post">
            <input type="hidden" name="idx" value="<?=$idx?>">
            <table>
                <tr>
                    <td class=title colspan="2">글수정</td>
                </tr>
                <tr></tr>
                <tr>
                    <th>아이디</th>
                    <td style="font-size:15pt;"><?=$_SESSION['userid']?></td>
                </tr>
                <tr>
                    <th>제목</th>
                    <td><input style="width:90%; font-size:15pt;"  type="text" name="title" style="width:100%;"required value="<?=$row['title']?>"></td>
                </tr>
                <tr>
                    <th>내용</th>
                    <td><textarea style="width:90%; font-size:15pt;" name="content" rows="20" style="width:100%;"><?=$row['content']?></textarea></td>
                </tr>
                <tr style="height:80px;">
                    <td colspan="2" align="center">
                        <input class="button" style="width:100px;" type="submit" value="글수정">
                        &nbsp;&nbsp;
                        <a href="javascript:history.go(-1);"><input class="button" type="button" value="취소"></td>
                </tr>
            </table>
        </form>
    </body>
</html>