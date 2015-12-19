목<?php
    include('./config.php');
    if(isset($_POST["headline"]) && isset($_POST["content"])){
        $hdline = $_POST["headline"];
        $content = $_POST["content"];
        $writer = $_SESSION["user_nic"];
        
        $query = "INSERT INTO board VALUES(NULL, '$hdline', '$writer', now(), '$content')";
        $result = mysql_query($query);
        
        
        if($result){
            $idx = mysql_insert_id();
            echo "<script>alert('글 등록 성공!!');location.href='./qna_view.php?idx=$idx'</script>";
            exit();
        }else{
            echo "<script>alert('글 등록 실패!!');history.back();</script>";
            exit();
        }
        
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>main</title>
        <link href="../css/qna_write_css.css" rel="stylesheet">
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
                <span class="bigbigsent">글 쓰기</span><br>
                <form method="post">
                    <span class="bigsent">제목</span><br><input maxlength="20" placeholder="20자 내외" id="hdinput" type="text" name="headline"/><br>
                    <span class="bigsent">내용</span><br><textarea id="cttexta" name="content" cols="30" rows="15"></textarea><br>
                    <button type="submit" class="subsub">등록!</button>
                </form>
            </div>
        </div>
        <div class="blank_bottom"></div>
    </body>
</html>