<?php
    $table = $_GET["table"];
    $page = $_GET["page"];
    $num = $_GET["num"];
    // $name = $_POST["name"];
    // $password = $_POST["pass"];
    $subject = $_POST["subject"];
    $content = $_POST["content"];

    include "../include/db_connect.php";
    $sql = "update $table set subject='$subject', content='$content' where num = '$num';";
    $result = mysqli_query($con,$sql);

    mysqli_close($con);

    echo "<script>
            alert('수정이 완료되었습니다.');
            location.href='index.php?type=list&table=$table&page=$page';
            </script>"

?>