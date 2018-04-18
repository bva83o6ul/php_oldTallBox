<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
    *{margin:0;padding: 0;}
    div{
        width: 260px;
        height: 200px;
        border-radius:5px;
        margin:100px auto;
        border: 1px solid #000;
        padding:20px;
        position:relative;


        }
    input{
        border-radius:5px;

        }
    p{
        margin-top:20px;
        text-align:center;
        }
    #joinbox a{
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
    header{
        position: absolute;
        top: 0;
        width: 100%;
        height: 30px;
        border-bottom: 1px solid lightblue;
    }

    </style>
    <meta charset="utf-8">
</head>
    <body>
        <header><p id="weather"></p></header>
        <!-- <form action="jointext.php" method="post"> -->
            <div id="joinbox">
                <p>帐号：<input type="text" name="enrollid" id="text11"></p>
                <p id="info"></p>
                <p>密码：<input type="password" name="enrollpwd" id="text22"></p>
                <p><input type="submit" value="登录" id="join"></p>
                <p><a href="jop_2_2.html">注册</a></p>
            </div>
        <!-- </form> -->
    </body>
</html>
<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
<script type="text/javascript">

    var weather =document.getElementById("weather");
    var join = document.getElementById("join");
    //获取文档的text
    $.get("time.txt",function(data){
        //方法1，JSON.parse();
        // var dateObj = JSON.parse(data);//将JSON形式的字符串转为JSON对象

        //方法2，eval();恶魔方法
        // var dateObj = eval("("+data+")");

        //方法3，构造函数。
        var dateObj = (new Function("return"+data))();
        console.log(dateObj.time)
    })
    //ajax
    $(join).click(function(){
            $.post("jointext.php",{
                "enrollid":$("#text11").val(),
                "enrollpwd":$("#text22").val()
            },function(data){
                console.log(data);
            
            if(data==1){

                $("#info").html("登陆成功<a id='a' href='javascript:;'>点击进入聊天室</a>");
                $('#a').click(function(){  
                    //var abb = $('#text11').val();
                     //console.log(abb,'提交');

                    $.post("jop_2_loding.php",{
                        "name":$('#text11').val()
                    },function(data){
                        console.log(data)
                        if(data == 1){
                            //注册成功，进入聊天室
                           window.location = "jop_2_talkindex.php";
                        }
                    });
                 });
                $("input").eq(1).val("");

               
            }else if(data==0){
                $("#info").html("登录失败，请输入正确的帐号密码！");
                $("#info").css({"color":"red"})
                $("input").eq(0).val("");
                $("input").eq(1).val("");
            };
            
        })
    })


    

</script>
