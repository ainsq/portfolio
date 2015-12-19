<?php
    include('./config.php');
    
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>main</title>
        <link href="../css/portfolio_css.css" rel="stylesheet">
    </head>
    <body>
        <div id="sidebar">
            <div class="sidemenu_div"><a href="../index.php"><div class="sidebar_non_menu"><img id="img_logo" src="../image/my_logo.jpg"></div></a></div>
            <div class="sidemenu_div"><a href="aboutme.php"><div class="sidebar_menu">자기소개</div></a></div>
            <div class="sidemenu_div"><div class="sidebar_menu_on">포트폴리오</div></div>
            <div class="sidemenu_div"><a href="qna.php"><div class="sidebar_menu">Q&amp;A</div></a></div>
            <?php
            if(isset($_SESSION["user_id"]) && isset($_SESSION["user_pw"])){
            ?>
            <div class="sidemenu_div"><a href="logout.php"><div class="sidebar_menu">로그아웃</div></a></div>
            <?php
            }else{
            ?>
            <div class="sidemenu_div"><a href="login.php"><div class="sidebar_menu">로그인</div></a></div>
            <?php
            }
            ?>
            
            </div>
        <div id="mainpage">
            
            <div id="navi" class="navi">
                <h1>navigation</h1><br>
                <div class="navi_div"><a href="#cp">자리배치</a></div>
                <div class="navi_div"><a href="#pl">Plant.</a></div>
                <div class="navi_div"><a href="#gg">Life is Colorful</a></div>
            </div>
            <br><br>
            <!--classplacement-->
            <div id="cp" class="tletle">
                <div class="explain">
                    <span class="bigsent">자리배치</span>&nbsp;자리배치 프로그램입니다.<br>
                    <span class="smallbig">제작기간</span>&nbsp;2일(3시간~4시간)<br>
                    <span class="smallbig">제작동기</span><br>
                    <div class="explainbar">
                        매번 룰렛 돌려서 번거롭게 바꾸기 보다는 한번에 편하고 빠르게 바꾸자해서 만들었습니다.<br> (근데 막상 룰렛 돌릴 때 보다 자리 뽑는 과정이 재미가 없어서 실사용은 X..)
                    </div>
                    <br>
                    <div class="iframeclass_box">
                        <iframe class="iframeclass" src="../portfolio/class.html"></iframe>
                    </div>
                </div>
                <br>
                <div class="gotop"><a href="#navi">▲TOP</a></div>
            </div>
            
            <br>
            <!--plant.-->
            <div id="pl" class="tletle">
                <div class="explain">
                    <span class="bigsent">Plant.</span>&nbsp;컴그 시간 캘리그라피<br>
                    <span class="smallbig">제작기간</span>&nbsp;1주일(4시간)<br>
                    <span class="smallbig">제작동기</span><br>
                    <div class="explainbar">
                        풀떼기와 식물을 그리고 싶어서...
                    </div>
                    <br>
                    <div class="img_cali">
                        <img class="imgcali" src="../portfolio/cali.png"/>
                    </div>
                    <br>
                </div>
                <div class="gotop"><a href="#navi">▲TOP</a></div>
            </div>
            
            <br>
            <!--life is colorful-->
            <div id="gg" class="tletle">
                <div class="explain">
                    <span class="bigsent">Life  is colorful.</span>&nbsp;그래픽공모전 제출<br>
                    <span class="smallbig">제작기간</span>&nbsp;2일(6시간)<br>
                    <span class="smallbig">제작동기</span><br>
                    <div class="explainbar">
                        책장에 여러가지 색의 책이 꽂혀있길래 이거다 싶어서 만듬
                    </div>
                    <br>
                    <div class="img_cali">
                        <img class="imgcali" src="../portfolio/gg.jpg"/>
                    </div>
                    <br>
                </div>
                <div class="gotop"><a href="#navi">▲TOP</a></div>
            </div>
            
        </div>
    </body>
</html>