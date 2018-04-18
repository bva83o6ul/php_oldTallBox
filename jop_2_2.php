<?php
    //get方法
    // $enrollid = $_GET["name"];

    //post的方法发送请求。
    $enrollid = $_POST["name"];
    //链接数据库
    mysql_connect("localhost","root",123456);
    //进入库
    mysql_select_db("info");
    //设置字符集
    mysql_query("SET NAMES UTF8");
    //select是查找
    $sql = "SELECT * FROM user WHERE enrollid ='$enrollid'";
    //执行查找代码
    $result = mysql_query($sql);
    //看看有库里面有多少要查找的代码
    $conter = mysql_num_rows($result);
    //有就输出1，没就输出0.
    if($conter == 1){
        echo 1;
    }else{
        echo 0;
    };
?>