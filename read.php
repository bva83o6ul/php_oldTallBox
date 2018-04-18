<?php
    //header("Content-type:application/json");
    //连接数据库，参数：数据库地址、用户名、密码
    mysql_connect("localhost","root",123456);
    //选择要操作的数据库
    mysql_select_db("info");
    //设置编码
    mysql_query("SET NAMES UTF8");
    //写执行的sql语句
    $sql = "SELECT * FROM talk ORDER BY id ASC";
    //执行sql语句
    $result = mysql_query($sql);

    //将对象转为数组
    $array = array("result"=>array()); //空数组，存储遍历的数据
    while($arr = mysql_fetch_array($result)){
        array_push($array["result"],$arr);
    }

    print_r(json_encode($array));

?>
