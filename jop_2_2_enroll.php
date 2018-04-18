     <meta charset="utf-8">
<?php
    $enrollid = $_POST["enrollid"];
    $enrollpwd =$_POST["enrollpwd"];
    mysql_connect("localhost","root",123456);
    mysql_select_db("info");
    mysql_query("SET NAMES UTF8");
    //INSERT是添加数据
    $sql = "INSERT INTO user(enrollid,psw) VALUES ('$enrollid','$enrollpwd')";
    $result = mysql_query($sql);
    //判断是否执行完成
    if($result){
        echo "恭喜您注册成功";
        echo "</br>";
        echo "<a href='join.php'>转回主页面</a>";
    }
 ?>