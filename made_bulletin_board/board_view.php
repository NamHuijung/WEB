<? session_start();?>
<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>글보기</title>
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
            height: 40px;
            font-size: 20pt; font-weight: bold;
            text-align: center;
            color: black;
            background-color: rgb(231, 231, 231);
        }
        .body {
            border: 3px solid rgb(216, 216, 216);
            font-size:15pt;
        }
        .button {
            width:100px; height:45px;
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
        $cp = $_GET['cp'];
        $writer = $_SESSION['userid'];

        # 해당 글 조회
        $sql = "select * from hj_board
                where idx = $idx";
        $res = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($res);
        if ($row['userid'] != $writer){
            $hit_sql = "update hj_board set hit=hit+1
                        where idx = $idx";
            mysqli_query($db, $hit_sql);
        }
        $res = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($res);
        ?>

        <table>
            <tr>
                <th class=title colspan="6">글보기</th>
            </tr>
            <?if ($row['userid'] == $writer){?>
                <tr style="height: 60px">
                    <td colspan="6" style="text-align:right">
                        <a href="mod_form.php?idx=<?=$idx?>"><input class="button" type="button" value="수정"></a>
                        <a href="del_form.php?idx=<?=$idx?>"><input class="button" type="button" value="삭제"></a>
                    </td>
                </tr> 
            <?}
            else{?>
                <tr style="height:15px;"></tr>
            <?}?>            
            <tr>
                <th>글쓴이</th>
                <td class="body" style="text-align:center"><?=$row['userid']?></td>
                <th>등록일</th>
                <td class="body" style="text-align:center"><?=$row['reg_date']?></td>
                <th>조회수</th>
                <td class="body" style="text-align:center"><?=$row['hit']?></td>
            </tr>
            <tr>
                <th>제목</th>
                <td colspan="5" class="body"><?=$row['title']?></td>
            </tr>
            <tr style="height: 110px;">
                <th>내용</th>
                <td colspan="5" class="body"><?=nl2br($row['content'])?></td>
            </tr>
            <tr style="height: 60px">
                <td colspan="6" align="center">
                    <a href="board.php?cp=<?=$cp?>"><input class = "button" type="button" value="목록"></a>
                </td>
            </tr>
        </table>
    </body>
</html>