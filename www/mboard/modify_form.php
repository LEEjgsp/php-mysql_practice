<?php
    $page = $_GET["page"];
    $num = $_GET["num"];
    if(!isset($_SESSION["userid"])){
        echo "<script>
            alert('로그인 후 이용해주세요.');
            location.href='../member/index.php?type=login_form';
                </script>";   
    }

    include "../include/db_connect.php";
    $sql = "select * from $table where num = '$num';";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    // $password = $row["pass"];
    $subject = $row["subject"];
    $content = $row["content"];
    $file_name = $row["file_name"];
    mysqli_close($con);
?>
<script>
    function check_input(){
        // if(!document.board.name.value){
        //     alert('이름을 입력해주세요.');
        //     document.board.name.focus();
        //     return;
        // }
        // if(!document.board.pass.value){
        //     alert('비밀번호를 입력해주세요.');
        //     document.board.pass.focus();
        //     return;
        //}
        if(!document.board.subject.value){
            alert('제목을 입력해주세요.');
            document.board.subject.focus();
            return;
        }
        if(!document.board.content.value){
            alert('내용을 입력해주세요.');
            document.board.content.focus();
            return;
        }
        document.board.submit();
    }
</script>

<form name="board" action="index.php?type=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" method="post">
<div class="board_form">
<h2 class="title"> <?=$board_title?> > 수정하기 </h2>
    <ul>
        <li>
            <span class="col1">이름 : </span>
            <span class="col2"><?=$name?></span>
        </li>
        <!-- <li>
            <span class="col1">비밀번호 : </span>
            <span class="col2"><input type="password" name="pass" value=""></span>
        </li> -->
        <li>
            <span class="col1">제목 : </span>
            <span class="col2"><input type="text" name="subject" value="<?=$subject?>"></span>
        </li>
        <li class="area">
            <span class="col1">내용 : </span>
            <span class="col2"><textarea name="content"><?=$content?></textarea></span>
        </li>
        <li>
            <span class="col1">첨부파일</span>
            <span class="col2"><input type="file" name="upfile" value="<?=$file_name?>"></span>
        </li>
    </ul>
</div>
    <ul class="buttons">
        <li><button type="button" onclick="check_input()">저장하기</button></li>
        <li><button type="button" onclick="location.href='index.php?type=list&table=<?=$table?>&page=<?=$page?>'">목록보기</button></li>
    </ul>
</form>