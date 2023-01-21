<?php

    session_start();

    if(isset($_SESSION["userid"])){
        $userid = $_SESSION["userid"];
        $username = $_SESSION["username"];
        $userlevel = $_SESSION["userlevel"];
    }else{
        $userid = "";
        $username = "";
        $userlevel = "";
    }
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>php/mysql연습</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header>
    <h3 class="logo">
        <a href="../main/index.php">PHP/MYSQL연습</a>
    </h3>
    <ul class="top_menu">
        <?php
            if($userid == ""){
                echo "<li>방문을 환영합니다.</li>";
        }else{
            echo "<li>".$username."(Level:".$userlevel.")님 환영합니다.</li>";
        }
        ?>
    </ul>
    <ul class="main_menu">
        <?php
            if($userid != ""){
        ?>
            <li><a href="../member/logout.php">로그아웃</a></li>
            <li><a href="../member/index.php?type=modify_form">정보수정</a></li>
        <?php
            }else{
        ?>
            <li><a href="../member/index.php?type=form">회원가입</a></li>
            <li><a href="../member/index.php?type=login_form">로그인</a></li>
        <?php
            }
        ?>
            <li>|</li>
            <li><a href="../mboard/index.php?type=list&table=_notice&page=1">공지 게시판</a></li>
            <li><a href="../mboard/index.php?type=list&table=_qna&page=1">QNA 게시판</a></li>
            <li><a href="../mboard/index.php?type=list&table=_youtube&page=1">YOUTUBE 게시판</a></li>
    </ul>
</header>