
<?php

    $enrollid = $_POST["enrollid"];
    $enrollpwd =$_POST["enrollpwd"];
    mysql_connect("localhost","root",123456);
    mysql_select_db("info");
    mysql_query("SET NAMES UTF8");
    $sqlid = "SELECT * FROM user WHERE enrollid ='$enrollid'";
    $resultid = mysql_query($sqlid);
    $ID = mysql_fetch_array($resultid);
    if($ID["psw"] == $enrollpwd){
        echo 1;

    }else{
        echo 0;
    }



 ?>