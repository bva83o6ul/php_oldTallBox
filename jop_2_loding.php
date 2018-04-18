<?php
   $abb = $_POST['name'];

    //开启会话name
    session_start();
    //存储用户名
    $_SESSION["abb"] = $abb;
    echo 1;
?>