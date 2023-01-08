<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>로그인</title>
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
            width:250px; height:130px;
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
        <form name="login" action="login_proc.php" method="post">
            <table>
                <tr>
                    <th class=title colspan="2">로그인</th>
                </tr>
                <tr>
                    <th class=head>아이디</th>
                    <td><input style="width:250px; font-size:15pt;" type="text" name="userid" required></td>
                </tr>
                <tr>
                    <th class=head>비밀번호</th>
                    <td><input style="width:250px; font-size:15pt;" type="password" name="passwd" required></td>
                </tr>
                <tr style="height:100px;">
                    <td colspan="2" align="center">
                        <input  class=button type="submit" value="로그인">
                        &nbsp;&nbsp;
                    <a href="reg_form.php"><input class=button type="button" value="회원가입"></td>
                </tr>
            </table>
        </form>
    </body>
</html>