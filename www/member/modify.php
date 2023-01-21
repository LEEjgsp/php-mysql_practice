<?php



$id = $_GET["id"];
$password = $_POST["pass"];
$name = $_POST["name"];
$email = $_POST["email"];

include "../include/db_connect.php";

$sql = "update _mem set pass = '$password', name = '$name', email = '$email' where id = '$id';";

mysqli_query($con,$sql);

session_start();
$_SESSION["userid"] = $id;
$_SESSION["username"] = $name;

mysqli_close($con);

echo "<script>
        alert('수정이 완료되었습니다.');
        location.href='../main/index.php';
        </script>";

?>