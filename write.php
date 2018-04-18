<?php
    $content = $_POST["content"];
    $talker = $_POST["name"];
    mysql_connect("localhost","root",123456);
    mysql_select_db("info");
    mysql_query("SET NAMES UTF8");
    $sql = "INSERT INTO talk(talker,content)VALUES ('$talker','$content')";
    $con = "SELECT * FROM talk ";
    $result =mysql_query($sql);
    $cont =mysql_query($con);
    //发送成功
    if($result){
        echo 1;
    }
 ?>