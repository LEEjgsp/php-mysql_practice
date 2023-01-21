<?php

$id = $_GET["id"];

include "../include/db_connect.php";

$sql = "select id from _mem where id = '$id';";

$result = mysqli_query($con,$sql);
$num = mysqli_num_rows($result);

if(!$num){
    echo "<script>
            self.close();
            alert('사용가능한 아이디 입니다.');
            </script>";
            exit;
}else{
    echo "<script>
            self.close();
            alert('이미 사용중인 아이디 입니다.');
            </script>";
            exit;
}

?>