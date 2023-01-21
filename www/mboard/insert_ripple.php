<?php
    
    $table = $_GET["table"];
    $num = $_GET["num"];
    $page = $_GET["page"];
    $ripple_content = $_POST["ripple_content"];

    session_start();
    if(!isset($_SESSION["userid"])){
        echo "<script>
                alert('로그인 후 이용할 수 있습니다.');
                history.go(-1)
                </script>";
        exit;
    }
    include "../include/db_connect.php";
    $userid = $_SESSION["userid"];
    $username = $_SESSION["username"];
    $regist_day = date("Y-m-d (H:i)");

   

    $sql = "insert into _qna_ripple (parent, id, name, content, regist_day)";
    $sql .= "values ('$num', '$userid', '$username', '$ripple_content', '$regist_day');";

    mysqli_query($con, $sql);

    mysqli_close($con);

    echo "<script>
            location.href='index.php?type=view&num=$num&page&$page&table=$table';
            history.go(-1)
            </script>";

?>