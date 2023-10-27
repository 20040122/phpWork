<?php
session_start();
header("Content-Type:text/html;charset=utf-8");
//$POST全局数组
$username = trim($_POST['username']);
$pw = trim($_POST['pw']);

if(!strlen($username) || !strlen($pw)){
    echo "<script>alert('用户名和密码不能为空！');history.back()</script>";
    exit;
}
else{
    if(!preg_match('/^[a-zA-Z0-9]{3,10}$/',$username)){
        echo "<script>alert('用户名必填，长度为3到10个由字母数字构成的字符!');history.back()</script>";
        exit;
    }
    if(!preg_match('/^[a-zA-Z0-9_*]{6,10}$/',$pw)){
        echo "<script>alert('密码必填，长度为6到10个由字母,数字，*,_,构成的字符!');history.back()</script>";
        exit;
    }
}
include_once 'conn.php';
//step2.设置字符集
mysqli_query($conn,"set names utf8");
$sql = "select * from info where username='$username'and pw='". md5($pw) ."'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num){
    $_SESSION['loggedUsername']=$username;
    echo "<script>location.href='index_2.php';</script>";
}
else{
    unset($_SESSION['loggedUsername']);
    echo "<script>alert('密码错误请重新输入');history.back()</script>";
}