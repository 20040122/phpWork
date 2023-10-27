<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>购物平台</title>
    <style>
        .smart-green .button {
            background-color: #9DC45F;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-border-radius: 5px;
            border: none;
            padding: 10px 25px 10px 25px;
            color: #FFF;
            text-shadow: 1px 1px 1px #949494;
        }
        .smart-green .button:hover {
            background-color:#80A24A;
        }
        form {
            display: flex;
            width: 400px;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            float: right;
            background-color: rgba(255, 255, 255, 0.35);
        }
        .red{
            color: red;
        }
        .main{
            width: 80%;
            margin: 0 auto;
            text-align: center
        }
        #web_bg{
            position:fixed;
            top: 0;
            left: 0;
            width:100%;
            height:100%;
            min-width: 1000px;
            z-index:-10;
            zoom: 1;
            background-color: #fff;
            background-repeat: no-repeat;
            background-size: cover;
            -webkit-background-size: cover;
            -o-background-size: cover;
            background-position: center 0;
        }

    </style>
</head>
<body>
<div class="wrapper">
    <!--背景图片-->
    <div id="web_bg" style="background-image: url(img/img_bk_03.png);"></div>
</div>
<div class="main">
    <?php
    include_once "nav.php";
    ?>
        <form action="postLogin.php" method="post" onsubmit="return check()" class="smart-green">
            <table align="center" border="1" style="border-collapse: collapse" cellpadding="10" cellspacing="0">
                <tr>
                    <td align="right">用户名</td>
                    <td align="left"><input name="username" ><span class="red">*</span></td>
                </tr>
                <tr>
                    <td align="right">密码</td>
                    <td align="left"><input type="password" name="pw"><span class="red">*</span></td>
                </tr>
                <tr>
                    <td align="middle"><input name="reset" type="reset" value="重置" class="button"></td>
                    <td align="middle"> <input name="submit" type="submit" value="登录" class="button"></td>
                </tr>
            </table>
        </form>
</div>
<script>
    function check(){
        let username=document.getElementsByName("username")[0].value.trim();
        let pw=document.getElementsByName("pw")[0].value.trim();
        let usernameReg=/^[a-zA-Z0-9]{3,10}$/
        if(!usernameReg.test(username)){
            alert("用户名必填，长度为3到10个由字母数字构成的字符!")
            return false;
        }
        let pwReg=/^[a-zA-Z0-9_*]{6,10}$/
        if(!pwReg.test(pw)){
            alert("密码必填，长度为6到10个由字母,数字，*,_,构成的字符!")
            return false;
        }
        return true
    }
</script>
</body>
</html>
