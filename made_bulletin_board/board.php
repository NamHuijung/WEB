<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>게시판 형식</title>
    </head>
    <style>
        table {
            width:900px;
            border-collapse: collapse;
            margin-top: 30px;
            margin-left:auto; 
            margin-right:auto;
        }
        .title{
            height: 110px;
            font-size: 30pt; font-weight: bold;
            border-bottom: 3px solid rgb(198, 198, 198);
            text-align: center;
            color: rgb(255, 255, 255);
            background-color: rgb(0, 40, 63);
        }
        th {
            height:60px;
            font-size: 20pt; font-weight: bold;
            border-bottom: 3px solid rgb(198, 198, 198);
            text-align: center;
            color: black;
        }
        .body{
            height:45px;
            font-size: 13pt;
            border-bottom: 3px solid rgb(234, 234, 234);
            text-align: center;
        }
        .button {
            width:100px; height:45px;
            font-size: 15pt; font-weight: bold;
            border: 5px solid black;
            color: rgb(255, 255, 255);
            background-color: rgb(0, 40, 63);
        }
        .liked {color:black; text-decoration-line: none;}
        .liked:visited {color:black;}
        .liked:hover {text-decoration: underline;}
    </style>
    <body>
        <?php
        include "db.php";
        // 전체 글의 수 조회
        $sql = "select count(*) from hj_board";
        $res = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($res);
        $total_item = $row[0];

        // 페이지 당 글의 수
        $page_per_item = 10;
        // 전체 페이지
        $total_page = ceil($total_item / $page_per_item);
        $current_page = $_GET['cp'];
        // 현재 페이지 정보가 없을 경우
        if (!$current_page) $current_page = 1;

        // 페이지의 첫 글의 위치
        $start = $page_per_item * ($current_page - 1);

        // 글목록 조회
        $sql = "select idx, userid, title, reg_date, hit 
                from hj_board
                order by idx desc
                limit $start, $page_per_item";
        $res = mysqli_query($db, $sql);
        $num_rows = mysqli_num_rows($res);
        ?>
        
        <table>
            <tr>
                <td class=title colspan="5">게시판</td>
            </tr>
            <tr style="height: 60px">
                <td colspan="5" style="text-align:right">
                    <a href="write_form.php"><input class="button" type="button" value="글쓰기"></a></td>
            </tr>
            <tr>
                <th style="width:10%;">번호</th>
                <th style="width:12%;">작성자</th>
                <th>제목</th>
                <th style="width:25%;">작성일</th>
                <th style="width:10%;">조회수</th>
            </tr>
            <?php for($i=0; $i < $num_rows; $i++){ 
                $row = mysqli_fetch_array($res);
            ?>
            <tr>
                <td class="body"><?=$row['idx']?></td>
                <td class="body"><?=$row['userid']?></td>
                <td style="text-align:left;" class="body"><a class="liked" href="board_view.php?idx=<?=$row['idx']?>&cp=<?=$current_page?>"><?=$row['title']?></td>
                <td class="body"><?=$row['reg_date']?></td>
                <td class="body"><?=$row['hit']?></td>
            </tr>
            <? }
                $prev = $current_page - 1;
                $next = $current_page + 1;
            ?>
            <tr style="height:10px;">
                <td colspan="3"></td>
            </tr>
            <tfoot>
                <tr>
                    <td style="width:80px; text-align:left">
                        <? if($prev > 0){ ?>
                        <a class="liked" href="?cp=<?=$prev?>">&lt;&lt;이전</a>
                        <? } ?>
                    </td>
                    <td></td>
                    <td colspan="3" style="width:80px; text-align:right">
                    <? if($next <= $total_page){ ?>
                        <a class="liked" href="?cp=<?=$next?>">다음&gt;&gt;</a>
                        <? } ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>