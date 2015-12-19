
<?php
    include('./config.php');
    if(!isset($_SESSION["user_id"]) && !isset($_SESSION["user_pw"])){
        echo "<script>history.back();</script>";
        exit();
    }
    echo "<script>var checklo = confirm('로그아웃 하시겠습니까?'); location.href='./logout_do.php?check=checklo';</script>"
    
?>