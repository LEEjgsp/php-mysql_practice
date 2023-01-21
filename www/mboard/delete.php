<?php
    $table = $_GET["table"];
    $num = $_GET["num"];
    include "../include/db_connect.php";
    $sql = "delete from $table where num = '$num';";
    mysqli_query($con,$sql);
    mysqli_close($con);

    echo "<script>
            alert('삭제가 완료되었습니다.');
            location.href='index.php?type=list&table=$table&page=1';
            </script>";

?>