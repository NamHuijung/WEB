<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>글삭제 형식</title>
    </head>
    <style>
        table {
            width:600px;
            margin-top: 30px;
            margin-left:auto; 
            margin-right:auto;
        }
        .title{
            height:110px;
            font-size: 30pt;
            text-align: center;
            font-weight: bold;
            color: rgb(255, 255, 255);
            background-color: rgb(0, 40, 63);
        }
        .head{
            width:250px; height:300px;
            font-size: 20pt; 
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
            $idx = $_GET['idx'];
        ?>
        <form name="del" action="del_proc.php" method="post">
            <input type="hidden" name="idx" value="<?=$idx?>">
            <table>
                <tr>
                    <td class=title>글삭제</td>
                </tr>
                <tr>
                    <td class="head">정말로 삭제하시겠습니까?</td>
                </tr>
                <tr>
                    <td align="center">
                        <input class="button" type="submit" value="글삭제">
                        &nbsp;&nbsp;
                        <a href="javascript:history.go(-1);"><input class="button" type="button" value="취소">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>