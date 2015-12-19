<?php
    include('./config.php');
    $query="SELECT * FROM board ORDER BY idx DESC";
    $result=mysql_query($query);
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>main</title>
        <link href="../css/qna_css.css" rel="stylesheet">
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
            <div class="board_box">
                <span class="bigsent">Q&amp;A</span>궁금한 걸 물어보세요!<br><br>
                <div style="height:15px;"></div>
                <table>
                    <tr>
                        <td class="top_td">idx</td>
                        <td class="blank_td"></td>
                        <td class="top_td">제목</td>
                        <td class="blank_td"></td>
                        <td class="top_td">작성자</td>
                        <td class="blank_td"></td>
                        <td class="top_td">작성일자</td>
                    </tr>
                    <?php
                    while($rows = mysql_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td class="board_idx"><?=$rows["idx"]?></td>
                        <td class="blank_td"></td>
                        <td class="board_headline"><a href="./qna_view.php?idx=<?=$rows['idx']?>"><?=$rows["headline"]?></a></td>
                        <td class="blank_td"></td>
                        <td class="board_writer"><?=$rows["writer"]?></td>
                        <td class="blank_td"></td>
                        <td class="board_date"><?=$rows["date"]?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
                <div style="margin-top: 10px;">
                    <button onclick="location.href='./qna_write.php'" class="blackb">글쓰기</button>
                </div>
            </div>
        </div>
        <div class="blank_bottom"></div>
    </body>
</html>