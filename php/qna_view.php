<?php
    include('./config.php');
    if(isset($_GET["idx"])){
        $idx=$_GET["idx"];
        $query="SELECT * FROM board WHERE idx=$idx";
        $row = mysql_fetch_array(mysql_query($query));
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>main</title>
        <link href="../css/qna_view_css.css" rel="stylesheet">
    </head>
    <body>
        <div id="sidebar">
            <div class="sidemenu_div"><a href="../index.php"><div class="sidebar_non_menu"><img id="img_logo" src="../image/my_logo.jpg"></div></a></div>
            <div class="sidemenu_div"><a href="aboutme.php"><div class="sidebar_menu">자기소개</div></a></div>
            <div class="sidemenu_div"><a href="portfolio.php"><div class="sidebar_menu">포트폴리오</div></a></div>
            <div class="sidemenu_div"><div class="sidebar_menu_on">Q&amp;A</div></div>
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
            <div class="view_get">
                <div>
                    <span class="bigsent">idx</span>&nbsp;<?=$idx?>
                    <span class="bigsent">작성일</span>&nbsp;<?=$row["date"]?>
                </div>
                <div>
                    <span class="bigsent">작성자</span>&nbsp;<?=$row["writer"]?>
                </div>
                <div>
                    <span class="bigsent">제목</span>&nbsp;<?=$row["headline"]?>
                </div>
                <div>
                    <span class="bigsent">내용</span><br>
                    <div class="content_box">
                        <?=nl2br($row["content"])?>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="button_bar">
                <?php
                if(isset($_SESSION["user_id"])){
                    if($_SESSION["user_nic"] == $row["writer"]){
                ?>
                <button onclick="location.href='./qna_delete.php?idx=<?=$idx?>'" class="blackb">삭제</button>
                <?php
                    }
                }
                ?>
                <button onclick="location.href='./qna.php'" class="blackb">목록</button>
                
            </div>
        </div>
        <div class="blank_bottom"></div>
    </body>
</html>