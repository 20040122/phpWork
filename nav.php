<style>
    .main{width: 80%;margin: 0 auto;text-align: center}
    h2{font-size: 16px}
    a{color: darkolivegreen;text-decoration: none;margin-right: 15px}
    a:hover{color: brown;text-decoration: underline}
    .logged{font-size: 16px;color: orange;margin-right:10px;float: right;} /* 新添加的 margin */
    .logout{margin-right: 20px; float: right;}
    .logout a{color: darkolivegreen;text-decoration: none}
    .logout a:hover{color: brown;text-decoration: underline}
    .header-links {
        float: left;

    }
</style>
<?php
if(isset($_SESSION['loggedUsername']) && $_SESSION['loggedUsername'] != ""){
    echo "<div class='logged'>当前用户: {$_SESSION['loggedUsername']} <span class='logout'><a href='logout.php'>注销登录</a></span></div>";
}
?>
<div class="header-links"> <!-- 左上角的链接 -->
    <a href="index.php">首页</a>
    <a href="signup.php">注册</a>
    <a href="login.php">登录</a>
</div>
