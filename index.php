<?php
include('./php/config.php');
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>main</title>
        <link href="css/index_css.css" rel="stylesheet">
    </head>
    <body>
        <div id="sidebar">
            <div class="sidemenu_div"><div class="sidebar_non_menu"><img id="img_logo" src="image/my_logo.jpg"></div></div>
            <div class="sidemenu_div"><a href="php/aboutme.php"><div class="sidebar_menu">자기소개</div></a></div>
            <div class="sidemenu_div"><a href="php/portfolio.php"><div class="sidebar_menu">포트폴리오</div></a></div>
            <div class="sidemenu_div"><a href="php/qna.php"><div class="sidebar_menu">Q&amp;A</div></a></div>
            <?php
            if(isset($_SESSION["user_id"]) && isset($_SESSION["user_pw"])){
            ?>
            <div class="sidemenu_div"><a href="php/logout.php"><div class="sidebar_menu">로그아웃</div></a></div>
            <?php
            }else{
            ?>
            <div class="sidemenu_div"><a href="php/login.php"><div class="sidebar_menu">로그인</div></a></div>
            <?php
            }
            ?>
            
            </div>
        <div id="mainpage">
            <img id="mainimage" src="image/stars.png"/><br>
            WELCOME TO MY PAGE!
        </div>
    </body>
</html>