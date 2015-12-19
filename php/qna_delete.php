<?php
    include('./config.php');
    if(isset($_GET["idx"]) && isset($_SESSION["user_nic"])){
        $idx=$_GET["idx"];
        $query = "SELECT writer FROM board WHERE idx = '{$idx}'";
        $checkwt = mysql_fetch_array(mysql_query($query));
        
        $writer = $checkwt["writer"];
        if($_SESSION["user_nic"] != $writer){
            echo "<script>alert('잘못 된 접근입니다!');history.back();";
            exit();
        }
        
        if(isset($_POST["dt_pw"])){
            $nonmd5 = $_POST["dt_pw"];
            $user_pw = md5($nonmd5);
            $user_id = $_SESSION["user_id"];
            $query = sprintf("SELECT user_nic FROM userinfo WHERE user_id='%s' AND user_pw = '%s'", mysql_real_escape_string($user_id), mysql_real_escape_string($user_pw));
            $candelete = mysql_num_rows(mysql_query($query));
            
            if($candelete == 1){
                $query = "DELETE FROM board WHERE idx='{$idx}'";
                $result = mysql_query($query);
                echo "<script>alert('글 삭제 성공!');location.href='./qna.php';</script>";
                exit();
                
            }else{
                echo "<script>alert('비밀번호가 일치하지 않습니다!');history.back();</script>";
                exit();
            }
        }
        
    }else{
        echo "<script>alert('잘못 된 접근입니다!');history.back();";
        exit();
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>main</title>
        <link href="../css/qna_delete_css.css" rel="stylesheet">
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
                <span class="bigbigsent">글 삭제</span><br>
                <form method="post">
                    <span class="bigsent">비밀번호를 입력해주세요</span><br><input maxlength="20" id="hdinput" type="password" name="dt_pw"/><br>
                    <button type="submit" class="subsub">등록!</button>
                </form>
            </div>
        </div>
        <div class="blank_bottom"></div>
    </body>
</html>