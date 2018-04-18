<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        *{margin:0;padding: 0;}
        #talkbigbox{
            background:lightblue;
            width: 300px;
            height: 300px;
            border: 1px solid #000;
            margin:20px auto;
            border-radius: 5px;
        }
        #talkbox{
            width: 270px;
            background:#fff;
        }
        #text{
            height: 25px;
            border-radius: 30px;
            border-color:lightblue;
        }
        #send{
            padding: 4px;
            border-radius: 20px;
            color:black;
        }
        #inputbox{
            border-radius: 5px;
            border-bottom: 1px solid #000;
            border-top: 1px solid #000;
            width: 100%;
            height: 40px;
            padding: 5px;
            box-sizing:border-box;
            background:#fff;

        }
        #inputbox b{
            color:lightgreen;
        }
        small{
            text-align:center;

        }
        a{
            display:line-block;
            width: 50px;
            height: 15px;
            border: 1px solid skyblue;
            text-decoration:none;
            border-radius:5px;
            font-size:11px;
            background:lightblue;
            color:#fff;
        }
        #boxbox{
            width: 290px;
            height: 250px;
            border-radius: 5px;
            overflow-y:auto;
            margin:5px;
            border: 1px solid #000;
            background:#fff;
        }
    </style>
    <meta charset="UTF-8" />
    <title>聊天室</title>
</head>
    <body>
        <header>
            <a href="join.php">退出至登录界面</a>
        </header>
        <div id="talkbigbox">
            <div id="boxbox">
                <p id="talkbox"></p>
            </div>
            <div id="inputbox">
                <b id="b">
                    <?php
                        session_start();
                        echo $_SESSION["abb"];
                    ?>
                </b>
                <input type="text" id="text" placeholder="回车发言">
                <input type="submit" id="send" value="发送">

            </div>
        </div>
    </body>
</html>
<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
    //点击发送
    $("#send").click(function(event){

            $("#boxbox").animate({"scrollTop":$("#talkbox").height()});
            $.post("write.php",{
            "content":$("#text").val(),
            "name":$("#b").html()

        },function(data){
             if(data==1){
                 $("#text").val("");
             }
        })
    });

//显示内容。
var oDate;
setInterval(function(){
    oDate = new Date();
    $.get('read.php',function(data){
        $("#talkbox").html("");//清空聊天内容，再读取新的
        var dataObj = JSON.parse(data);
        var arr = dataObj.result;
        for(var i = 0;i < arr.length;i++){
            $('#talkbox').append("<p><small>"+oDate.getFullYear() +"/" + (oDate.getMonth()+1)+"/"+ oDate.getDate()+"/" + oDate.getHours() + "/"+oDate.getMinutes()+"</small></p>"+"<p><b>"+arr[i].talker+"：</b><span>"+arr[i].content+"</span>"+"</br></br></p>")
        }
    });
 },200);
</script>