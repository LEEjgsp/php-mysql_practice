<?php
    $table = $_GET["table"];
?>

<script>
    function check_input(){
        // if(!document.board.pass.value){
        //     alert('비밀번호를 입력하세요.');
        //     document.board.pass.focus();
        //     return;
        // }
        if(!document.board.subject.value){
            alert('제목을 입력하세요.');
            document.board.subject.focus();
            return;
        }
        if(!document.board.content.value){
            alert('내용을 입력하세요.');
            document.board.content.focus();
            return;
        }
        document.board.submit();
    }
</script>

<form name="board" method="post" action="index.php?type=insert&table=<?=$table?>" enctype="multipart/form-data">
<div class="board_form">
<h2 class="title"><?=$board_title?> > 글쓰기</h2>
    <ul>
        <li>
            <span class="col1">이름 : </span>
            <span class="col2"><?=$username?></span>
        </li>
        <?php
        if($table != "_youtube"){
        ?>
        <!-- <li>
            <span class="col1">비밀번호 : </span>
            <span class="col2"><input type="password" name="pass"></span>
        </li> -->
        <?php
        }else{
        ?>
        <li>
            <span class="col1">유튜브 url주소 : </span>
            <span class="col2"><input type="text" name="youtube_url"></span>
        </li>
        <?php
        }
        ?>
        <li>
            <span class="col1">제목 : </span>
            <span class="col2"><input type="text" name="subject"></span>
        </li>
        <li class="area">
            <span class="col1">내용 : </span>
            <span class="col2"><textarea name="content"></textarea></span>
        </li>
        <?php
        if($table != "_youtube"){
        ?>
        <li>
            <span class="col1">첨부파일</span>
            <span class="col2"><input type="file" name="upfile"></span>
        </li>
        <?php
        }
        ?>
    </ul>
</div>
    <ul class="buttons">
        <li><button type="button" onclick="check_input()">저장하기</button></li>
        <li><button type="button" onclick="location.href='index.php?type=list&table=<?=$table?>&page=1'">목록보기</button></li>
    </ul>
</form>