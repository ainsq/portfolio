<?php
    include('./config.php');
    if(isset($_SESSION["user_id"]) && isset($_SESSION["user_pw"])){
        echo "<script>history.back();</script>";
        exit();
    }

if(isset($_POST["user_id"]) && isset($_POST["user_pw"])){
    $user_id = $_POST["user_id"];
    $user_pw = $_POST["user_pw"];
    
    $query= sprintf("SELECT * FROM userinfo WHERE user_id = '%s' AND user_pw = '%s'", mysql_real_escape_string($user_id), mysql_real_escape_string(md5($user_pw)));
    $id_check = mysql_num_rows(mysql_query($query));
    
    if($id_check != 1){
        echo "<script>alert('아이디 또는 비밀번호가 맞지 않습니다!');history.back();</script>";
        exit();
    }else{
        $query = sprintf("SELECT user_nic, user_age FROM userinfo WHERE user_id = '%s'", mysql_real_escape_string($user_id));
        $result = mysql_query($query);
        $rows = mysql_fetch_array($result);
        $alnic = $rows["user_nic"];
        
        $_SESSION["user_id"] = $user_id;
        $_SESSION["user_pw"] = $user_pw;
        $_SESSION["user_nic"] = $rows["user_nic"];
        echo "<script>alert('환영합니다, $alnic 님!');location.href='../index.php';</script>";
        exit();
    }    
}
    
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>main</title>
        <link href="../css/login_css.css" rel="stylesheet">
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
            <div class="sidemenu_div"><a href="login.php"><div class="sidebar_menu_on">로그인</div></a></div>
            <?php
            }
            ?>
            
            </div>
        <div id="mainpage">
            <div id="box">
                <div id="loginbox">
                    <h1>로그인</h1><hr>
                    <form method="post" name="login">
                        <table>
                            <tr>
                                <td>
                                    <input class="login_input" type="text" name="user_id" placeholder="아이디">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="login_input" type="password" name="user_pw" placeholder="비밀번호">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="login_submit" type="submit">로그인</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div id="orsome">
                    <span>아직 회원이 아니라면?</span>
                    <a href="register.php">회원가입</a>
                </div>
            </div>
        </div>
    </body>
</html>