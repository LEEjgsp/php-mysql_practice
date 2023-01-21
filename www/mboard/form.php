<?php
$table = $_GET["table"];
session_start();

if(isset($_SESSION["username"])){
    echo "<script>
            location.href='index.php?type=write&table=$table';
            </script>";
}else{
    echo "<script>
            alert('로그인 후 이용가능합니다.');
            location.href='../member/index.php?type=login_form';
            </script>";
}
?>
