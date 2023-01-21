<?php
    session_start();
    if(!isset($_SESSION["userid"])){
        echo "<script>
            alert('로그인 후 이용해주세요.');
            location.href='../member/index.php?type=login_form';
                </script>";
        exit;
    }

    $rip_id = $_GET["rip_id"];
    $page = $_GET["page"];
    $rip_num = $_GET["rip_num"];
    $num = $_GET["num"];
    $page = $_GET["page"];
    $table = $_GET["table"];

    $userid = $_SESSION["userid"];

    if($userid != $rip_id){
        echo "<script>
            alert('본인(사용자)만이 삭제할 수 있습니다.');
            history.go(-1)
                </script>";
            exit;
    }

    include "../include/db_connect.php";
    $sql = "delete from _qna_ripple where num = '$rip_num';";
    $result = mysqli_query($con,$sql);

    mysqli_close($con);

    echo "<script>
            alert('댓글이 삭제되었습니다.');
            location.href='index.php?type=view&table=$table&num=$num&page=$page';
            </script>";

?>