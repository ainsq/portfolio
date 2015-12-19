<?php
    include('./config.php');
    if(isset($_GET["check"])){
        $checklo = $_GET["check"];
        if($checklo == 1){
            $user_nic = $_SESSION["user_nic"];
        echo "<script>alert('로그아웃 되었습니다, $user_nic 님!');</script>";
        session_destroy();
        echo "<script>location.href='../index.php';</script>";
        exit();
        }else{
            echo "<script>history.go(-1);</script>";
            exit();
        }
    }else{
        echo "<script>history.go(-1);</script>";
        exit();
    }
?>