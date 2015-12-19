<?php
    include('./config.php');
    /*세션에 데이터가 있는데 접속하는 경우를 방지 */
    if(isset($_SESSION["user_id"]) && isset($_SESSION["user_pw"])){
        echo "<script>alert('잘못된 접근입니다!');history.back();</script>";
        exit();
    }
    if(isset($_SESSION["user_id"]) && isset($_SESSION["user_pw"])){
        echo "<script>history.back();</script>";
        exit();
    }

if(isset($_POST["user_id"]) && isset($_POST["user_pw"]) && isset($_POST["pw_con"]) && isset($_POST["user_age"]) && isset($_POST["user_nic"])){
    $user_id = $_POST["user_id"];
    $user_pw = $_POST["user_pw"];
    $pw_con = $_POST["pw_con"];
    $user_age = $_POST["user_age"];
    $user_nic = $_POST["user_nic"];
    /* 모든 정보가 빠짐 없이 기입되어 있는지 확인*/
    if(empty($_POST["user_id"]) || empty($_POST["user_pw"]) || empty($_POST["pw_con"]) || empty($_POST["user_age"]) || empty($_POST["user_nic"])){
        echo "<script>alert('모든 정보를 빠짐없이 입력해주세요!');history.back();</script>";
        exit();
    }
    /*중복 아이디 인지 확인*/
    $query="SELECT * FROM userinfo WHERE user_id = '{$user_id}'";
    $existid=mysql_num_rows(mysql_query($query));
    if($existid != 0){
        echo "<script>alert('이미 있는 아이디 입니다!');history.back();</script>";
        exit();
    }
    
    /*비밀번호와 비밀번호 확인이 일치하는 지 확인*/
    if($user_pw != $pw_con){
        echo "<script>alert('비밀번호와 비밀번호 확인이 일치하지 않습니다!');history.back();</script>";
        exit();
    }
    
    /*나이가 숫자가 아닌 경우*/
    if(ereg("[^0-9]",$user_age)){
        echo "<script>alert('나이란에 숫자만 입력해주세요!!');history.back();</script>";
        exit();
    }
    /*닉네임 중복 확인*/
    $query="SELECT user_nic FROM userinfo WHERE user_nic = '{$user_nic}'";
    $existnic=mysql_num_rows(mysql_query($query));
    if($existnic != 0){
        echo "<script>alert('이미 있는 닉네임입니다!');history.back();</script>";
        exit();
    }
    
    $query= sprintf("INSERT INTO userinfo VALUES('%s', '%s', '%s', '%s')",mysql_real_escape_string($user_id), mysql_real_escape_string(md5($user_pw)), mysql_real_escape_string($user_age), mysql_real_escape_string($user_nic));
    mysql_query($query);
    echo "<script>alert('회원가입이 완료되었습니다. 로그인 해 주세요!');location.href='login.php';</script>";
    exit();
    
}


    
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
            <div class="register_box">
                <h1>회원가입</h1><hr>
                <form method="post">
                    <span class="bigletter">아이디</span>최대 20자<br>
                    <input class="input_regi" type="text" name="user_id" maxlength="20"/><br>
                    <span class="bigletter">비밀번호</span>최대 20자<br>
                    <input class="input_regi" type="password" name="user_pw" maxlength="20"/><br>
                    <span class="bigletter">비밀번호 확인</span><br>
                    <input class="input_regi" type="password" name="pw_con" maxlength="20"/><br>
                    <span class="bigletter">나이</span><br>
                    <input class="input_regi" type="text" name="user_age"/><br>
                    <span class="bigletter">별명</span><br>
                    <input class="input_regi" type="text" name="user_nic"/><br><br>
                    <button type="submit" class="submit_regi">회원가입</button>
                </form>
            </div>
        </div>
    </body>
</html>