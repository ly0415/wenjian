<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <style type="text/css">
        body{margin:0;}
        #aa{width:1100px;height:700px;border:1px solid #000;background:#000;postion:absolute;float:left;}
        #bb{float:left;}#cc{float:left;}
        .pp{width:6px;height:6px;background:#fff;position:absolute;}
    </style>
    <script src="jquery.js"></script>
</head>
<body>
<div id="aa"></div>
<div id="bb"></div>
<div id="cc"></div>

<script type='text/javascript' src="jquery3.2.1.min.js"></script>
<script>
    var num = 100;	//元素的总个数
    var floatSpeed = 300;	//浮动速度
    var floatCycle = 500;	//浮动周期	（浮动速度的2倍）
    var $xx = 100;	//鼠标 x 坐标
    var $yy = 100;	//鼠标 y 坐标
    var moveTime = 600;		//移动时间
    var moveDistance = 20;	//移动距离
    var randMoveDistanceTop = 80;	//随机距离上限
    var randMoveDistanceDown = 5;	//随机距离下限
    var moveDistance2 = moveDistance;
    var moveDistance3 = moveDistance;
    var arrDistance = [];
    var addOrLess = null;	//随机符号
    var addOrLess2 = null;
    var arrAddOrLess = ["+", "-"];
    var intvalEleFloat = null;
    var intvalMouse = null;		//监视鼠标是否静止
    var intvalStartMouse = null;
    var fx = 0;		//标记鼠标是否移动
    var fy = 0;

    //创建元素
    for(var i=0;i < num;i++){$("#aa").append("<div id=\"p" + i + "\" class=\"pp\"></div>");}
    //初始化元素位置
    randPosition();
    //开始浮动
    goFloat();
    //监视鼠标是否静止
    intvalMouse = setInterval(function(){
        //若鼠标发生移动
        if(fx != $xx || fy != $yy){
            //清空动画列队，执行完现有动画
            $(".pp").stop(true, false);
            fx = $xx;
            fy = $yy;
            $("#cc").text("");
            //元素移动到鼠标位置
            follow();
            $("#bb").text("xx:" + $xx + "...yy:" + $yy + "...fx:"+fx+"...fy:"+fy);
        };
    }, 400);

    $("#aa").mousemove(function (e) {
        $xx = e.originalEvent.x || e.originalEvent.layerX || 0;
        $yy = e.originalEvent.y || e.originalEvent.layerY || 0;
        $("#bb").text("xx:" + $xx + "...yy:" + $yy + "...fx:"+fx+"...fy:"+fy);
        $(".pp").stop(true, false);
    });
    function randPosition(){
        $(".pp").each(function(){
            randDistance();
            $(this).animate({left:($xx + (arrDistance[2]))+"px", top:($yy + (arrDistance[3]))+"px"}, moveTime);
            $("#cc").append("<p>2:"+moveDistance2+"...3:"+moveDistance3+"...x:"+($xx + (moveDistance2))+"...y:"+($yy + (moveDistance3))+"</p>");
        });
    }
    function follow(){
        $(".pp").each(function(){
            randDistance();
            $(this).animate({left:($xx + (arrDistance[2]))+"px", top:($yy + (arrDistance[3]))+"px"}, moveTime);
        });
    }
    //移动随机距离
    function randDistance(){
        moveDistance = parseInt(Math.random() * (randMoveDistanceTop - randMoveDistanceDown + 1) + randMoveDistanceDown);
        addOrLess = arrAddOrLess[Math.floor(Math.random() * arrAddOrLess.length)];
        addOrLess2 = addOrLess;
        if(addOrLess == "-"){moveDistance2 = -moveDistance;}else{moveDistance2 = moveDistance;};
        moveDistance = parseInt(Math.random() * (randMoveDistanceTop - randMoveDistanceDown + 1) + randMoveDistanceDown);
        addOrLess = arrAddOrLess[Math.floor(Math.random() * arrAddOrLess.length)];
        if(addOrLess == "-"){moveDistance3 = -moveDistance;}else{moveDistance3 = moveDistance;};
        arrDistance[0] = moveDistance;
        moveDistance = parseInt(Math.random() * (randMoveDistanceTop - randMoveDistanceDown + 1) + randMoveDistanceDown);
        arrDistance[1] = moveDistance;
        arrDistance[2] = moveDistance2;
        arrDistance[3] = moveDistance3;
    }
    function goFloat(){
        intvalEleFloat = setInterval(eleFloat, floatCycle);
    }
    function eleFloat(){
        $(".pp").each(function(){
            randDistance();
            $(this).animate({left:addOrLess+"="+arrDistance[0]+"px", top:addOrLess2+"="+arrDistance[1]+"px"}, floatSpeed);
            if(addOrLess == "-"){addOrLess = "+";}else{addOrLess = "-";};
            if(addOrLess2 == "-"){addOrLess2 = "+";}else{addOrLess2 = "-";};
            $(this).animate({left:addOrLess+"="+arrDistance[0]+"px", top:addOrLess2+"="+arrDistance[1]+"px"}, floatSpeed);
        });
    }

</script>
</body>
</html>