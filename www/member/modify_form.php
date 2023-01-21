<?php

include "../include/db_connect.php";

$sql = "select * from _mem where id = '$userid';";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);

$id = $row["id"];
$password = $row["pass"];
$name = $row["name"];
$email = $row["email"];

mysqli_close($con);
?>
<script>
    function check_input(){
        if(!document.board.pass.value){
            alert('비밀번호를 입력해주세요.');
            document.board.pass.focus();
            return;
        }
        if(!document.board.pass_confirm.value){
            alert('비밀번호 확인을 입력해주세요.');
            document.board.pass_confirm.focus();
            return;
        }
        if(!document.board.name.value){
            alert('이름 입력해주세요.');
            document.board.name.focus();
            return;
        }
        if(!document.board.email.value){
            alert('이메일을 입력해주세요.');
            document.board.email.focus();
            return;
        }
        if(document.board.pass.value != document.board.pass_confirm.value){
            alert('비밀번호가 일치하지 않습니다.');
            document.board.pass.focus();
            return;
        }
        document.board.submit();
    }
</script>

<form name="board" action="modify.php?id=<?=$id?>" method="post">
<div class="board_form">
    <h2 class="title">정보수정</h2>
    <ul>
        <li>
            <span class="col1">아이디 : </span>
            <span class="col2"><?=$id?></span>
        </li>
        <li>
            <span class="col1">비밀번호 : </span>
            <span class="col2"><input type="password" name="pass" value="<?=$password?>"></span>
        </li>
        <li>
            <span class="col1">비밀번호 확인 : </span>
            <span class="col2"><input type="password" name="pass_confirm"></span>
        </li>
        <li>
            <span class="col1">이름 : </span>
            <span class="col2"><input type="text" name="name" value="<?=$name?>"></span>
        </li>
        <li>
            <span class="col1">이메일 : </span>
            <span class="col2"><input type="text" name="email" value="<?=$email?>"></span>
        </li>
    </ul>
</div>
    <ul class="buttons">
        <li><button type="button" onclick="check_input()">저장하기</button></li>
        <li><button type="button" onclick="history.go(-1)">취소하기</button></li>
    </ul>
</form>