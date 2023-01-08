<?php session_start();?>
<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>글쓰기</title>
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
        <form name="write" action="write_proc.php" method="post">
            <table >
                <tr>
                    <td class=title colspan="2">글쓰기</td>
                </tr>
                <tr></tr>
                <tr>
                    <th>아이디</th>
                    <td style="font-size:15pt;"><?=$_SESSION['userid']?></td>
                </tr>
                <tr>
                    <th>제목</th>
                    <td><input style="width:90%; font-size:15pt;" type="text" name="title" required></td>
                </tr>
                <tr>
                    <th>내용</th>
                    <td><textarea style="width:90%;font-size:15pt;" name="content" rows="20"></textarea></td>
                </tr>
                <tr style="height:80px;">
                    <td colspan="2" align="center">
                        <input class="button" type="submit" value="등록">
                        &nbsp;&nbsp;
                        <a href="javascript:history.go(-1);"><input style="width:120px;" class="button" type="button" value="돌아가기">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>