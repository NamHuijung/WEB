<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>회원가입</title>
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
        th {
            width:250px; height:80px;
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
        
        <form name="reg" action="reg_proc.php" method="post">
            <table>
                <tr>
                    <td class=title colspan="2">회원가입</td>
                </tr>
                <tr>
                    <th>아이디</th>
                    <td><input style="width:250px; font-size:15pt;" type="text" name="userid" required></td>
                </tr>
                <tr>
                    <th>암호</th>
                    <td><input style="width:250px; font-size:15pt;" type="password" name="passwd" required></td>
                </tr>
                <tr>
                    <th>이름</th>
                    <td><input style="width:250px; font-size:15pt;" type="text" name="name"></td>
                </tr>
                <tr>
                    <th>email</th>
                    <td><input style="width:250px; font-size:15pt;" type="text" name="email"></td>
                </tr>
                <tr style="height:100px;">
                    <td colspan="2" align="right"><input class="button" type="submit" value="가입"></td>
                </tr>
            </table>
        </form>
    </body>
</html>