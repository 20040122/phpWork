<?php
session_start();
session_destroy();
// 重定向到 index.php
header('Location: index.php');
