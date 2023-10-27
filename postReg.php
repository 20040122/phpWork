<?php
header("Content-Type:text/html;charset=utf-8");
//$POST全局数组
$username = trim($_POST['username']);
$pw = trim($_POST['pw']);
$cpw = trim($_POST['cpw']);
$sex=$_POST['sex'];
$email=$_POST['email'];
$fav=implode(",",$_POST['fav']);


//必要的验证
if(!strlen($username) || !strlen($pw)){
    echo "<script>alert('用户名和密码不能为空！');history.back()</script>";
    exit;
}
else{
    if(!preg_match('/^[a-zA-Z0-9]{3,10}$/',$username)){
        echo "<script>alert('用户名必填，长度为3到10个由字母数字构成的字符!');history.back()</script>";
        exit;
    }
}
if($pw!=$cpw){
    echo "<script>alert('密码和确认密码必须相同！');history.back()</script>";
    exit;
}
else{
    if(!preg_match('/^[a-zA-Z0-9_*]{6,10}$/',$pw)){
        echo "<script>alert('密码必填，长度为6到10个由字母,数字，*,_,构成的字符!');history.back()</script>";
        exit;
    }
}
if(!empty($email)){
    if(!preg_match('/^[a-zA-Z0-9_\-]+@([a-zA-Z0-9]+\.)+(com|cn|net|org)$/',$email)){
        echo "<script>alert('信箱格式不对!');history.back()</script>";
        exit;
    }
}

include_once "conn.php";
$sql="select * from info where username='$username'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num){
    echo "<script>alert('用户已经存在！');history.back()</script>";
    exit;
}
//sql语句 密码MD5加密
$sql="insert into info (username,pw,sex,email,fav,createTime) values('$username','".MD5($pw)."','$sex','$email','$fav','".time()."') ";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<script>alert('数据插入成功');location.href='index.php'</script>";
}
else{
    echo "<script>alert('数据插入失败');location.href='signup.php'</script>";
}