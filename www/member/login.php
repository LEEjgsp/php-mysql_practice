<?php
    $id = $_POST["id"];
    $password = $_POST["pass"];

    include "../include/db_connect.php";

    $sql = "select * from _mem where id = '$id';";
    $result = mysqli_query($con, $sql);
    $res = mysqli_num_rows($result);

    if(!$res){
        echo "<script>
                window.alert('등록되지 않은 아이디입니다.');
                history.go(-1);
                </script>";
    }else{
        $row = mysqli_fetch_assoc($result);
        $pass = $row["pass"];
        if($password != $pass){
            echo "<script>
                    alert('비밀번호가 틀립니다.');
                    history.go(-1);
                    </script>";
        }
        else{
            session_start();

            $_SESSION["userid"] = $row["id"];
            $_SESSION["username"] = $row["name"];
            $_SESSION["userlevel"] = $row["level"];

            echo "<script>
                    location.href='../main/index.php';
                    </script>";
        }
    }
    mysqli_close($con);

?>