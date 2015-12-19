<?php
    include('./config.php');
    if(!isset($_SESSION["user_id"]) && !isset($_SESSION["user_pw"])){
        echo "<script>history.back();</script>";
        exit();
    }
$user_id = $_SESSION["user_id"];
$user_nic = $_SESSION["user_pw"};



    
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>main</title>
        <link href="../css/register_css.css" rel="stylesheet">
    </head>
    <body>
        <div id="sidebar">
            <div class="sidemenu_div"><a href="../index.php"><div class="sidebar_non_menu"><img id="img_logo" src="../image/my_logo.jpg"></div></a></div>
            <div class="sidemenu_div"><a href="aboutme.php"><div class="sidebar_menu">자기소개</div></a></div>
            <div class="sidemenu_div"><a href="portfolio.php"><div class="sidebar_menu">포트폴리오</div></a></div>
            <div class="sidemenu_div"><a href="qna.php"><div class="sidebar_menu">Q&amp;A</div></a></div>
            <?php
            if(isset($_SESSION["user_id"]) && isset($_SESSION["user_pw"])){
            ?>
            <div class="sidemenu_div"><a href="userinfo.php"><div class="sidebar_menu"><?=$_SESSION["user_nic"]?></div></a></div>
            <?php
            }else{
            ?>
            <div class="sidemenu_div"><a href="login.php"><div class="sidebar_menu">로그인</div></a></div>
            <?php
            }
            ?>
            
            </div>
        <div id="mainpage">
            
        </div>
    </body>
</html>