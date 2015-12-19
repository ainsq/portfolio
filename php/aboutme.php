<?php
    include('./config.php');
    
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>main</title>
        <link href="../css/aboutme_css.css" rel="stylesheet">
    </head>
    <body>
        <div id="sidebar">
            <div class="sidemenu_div"><a href="../index.php"><div class="sidebar_non_menu"><img id="img_logo" src="../image/my_logo.jpg"></div></a></div>
            <div class="sidemenu_div"><div class="sidebar_menu_on">자기소개</div></div>
            <div class="sidemenu_div"><a href="portfolio.php"><div class="sidebar_menu">포트폴리오</div></a></div>
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
            <div class="boxbox">
                <img class="introduce1" src="../image/introduce_1.jpg"/>
                <h1>Introduce.</h1>
                <span class="bigsent">이름</span>&nbsp;이민승<br>
                <span class="bigsent">나이</span>&nbsp;17<br>
                <span class="bigsent">학교</span>&nbsp;선린인터넷고등학교<br>
                <span class="bigsent">과</span>&nbsp;멀티미디어과<br>
                <span class="bigsent">관심분야</span>&nbsp;javascript, C#<br>
                <br><br>
                <h1>Hobby/Like</h1>
                <span class="bigsent">게임</span>&nbsp;LOL<br>
                <span class="bigsent">음악</span>&nbsp;여자친구, 복면가왕<br>
                <br><br>
                <h1>Contact</h1>
                <span class="bigsent">이메일</span>&nbsp;ainsq@naver.com<br>
                <span class="bigsent">페이스북</span>&nbsp;<a href="https://www.facebook.com/heatflower">이민승</a><br>
                <span class="bigsent">Telegram</span>&nbsp;@serious<br>
                <br><br><br>
            </div>
        </div>
    </body>
</html>