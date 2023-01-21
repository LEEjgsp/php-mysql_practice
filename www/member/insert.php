<?php
    include "../include/db_connect.php";

    $id = $_POST["id"];
        $sql2 = "select * from _mem where id = '$id';";
        $result = mysqli_query($con,$sql2);
        $record_number = mysqli_num_rows($result);
        if($record_number >= 1){
                echo "<script>
                        alert('이미 등록된 아이디입니다.\\r\\n다른 아이디를 사용해주세요.');
                        history.go(-1)
                        </script>";
                exit;
        }


    $password = $_POST["pass"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $regist_day = date("Y-m-d (H:i)");


    $sql = "insert into _mem (id, pass, name, email, regist_day,
            level, point)";
    $sql .= "values('$id','$password','$name','$email','$regist_day', 9, 100);";
    mysqli_query($con,$sql);

    mysqli_close($con);

    echo "<script>
            alert('회원가입이 완료되었습니다.')
            location.href='index.php?type=login_form';
            </script>";
?>