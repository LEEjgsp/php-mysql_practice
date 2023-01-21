<?php
    $page = $_GET["page"];
    $num = $_GET["num"];
    
    include "../include/db_connect.php";

    $sql = "select * from $table where num = '$num';";

    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    $subject = $row["subject"];
    $name = $row["name"];
    $regist_day = $row["regist_day"];
    $content = $row["content"];
    
    $file_name = $row["file_name"];
    $file_type = $row["file_type"];
    $file_copied = $row["file_copied"];

?>
<ul class="board_view">
<h2 class="title"><?=$board_title?> > 내용보기</h2>

    <li class="row1">
        <span class="col1"><b>제목 : <?=$subject?></b></span>
        <span class="col2"><?=$name?> | <?=$regist_day?></span>
    </li>
    <li class="row2">
        <?php
            if($file_name && $table != "_youtube") {
                $file_path = "./data/".$file_copied;
                $file_size = filesize($file_path);

                echo "▷ 첨부파일 : <b>$file_name</b> ($file_size Byte)
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='download.php?num=$num&page=$page&file_name=$file_name&file_type=$file_type
                        &file_copied=$file_copied'>[저장]</a><br><br>";
            }else if($table == "_youtube" && $file_name){
                $url = $row["url"];
                echo "<iframe width='560' height='315'src=$url title='YouTube video player' frameborder='0' 
                allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' 
                allowfullscreen></iframe>";
                echo "<br>";
            }
            echo $content;

        ?>
    </li>
    <?php
        if($table == "_qna"){
    ?>
        
    <?php
            $table_ripple = $table."_ripple";
            $sql2 = "select * from $table_ripple where parent = '$num' order by $num;";
            $result2 = mysqli_query($con,$sql2);
            while($rip_row=mysqli_fetch_assoc($result2)){
                $rip_name = $rip_row["name"];
                $rip_id = $rip_row["id"];
                $rip_num = $rip_row["num"];
                $rip_regist_day = $rip_row["regist_day"];
                $rip_content = $rip_row["content"];
                $rip_content = str_replace("\n","<br>",$rip_content);
                $rip_content = str_replace(" ","&nbsp;",$rip_content);
            
    ?>
            <div class="ripple_title">
                <span class="col1"><?=$rip_name?></span>
                <span class="col2"><?=$rip_regist_day?></span>
                <span class="col3">
                <?php
                    echo "<a href='index.php?type=delete_rip&table=$table&rip_num=$rip_num&page=$page&num=$num&rip_id=$rip_id'>
                            삭제</a>&nbsp;&nbsp;|&nbsp;&nbsp;";
                ?>
                </span>
            </div>
            <div class="ripple_content">
                <?=$rip_content?>
            </div>
    <?php
            }
            mysqli_close($con);
    ?>
            <script>
                function ripple_check_input(){
                    if(!document.ripple_form.ripple_content.value){
                        alert('댓글내용을 적어주세요.');
                        document.ripple_form.ripple_content.focus();
                        return;
                    }
                    document.ripple_form.submit();
                }
            </script>
            <div class="ripple_box">
                <form name="ripple_form" action="index.php?type=insert_ripple&table=<?=$table?>&page=<?=$page?>&num=<?=$num?>" method="post">
                    <div class="ripple_box1"><img src='../img/ripple_title.png'></div>
                    <div class="ripple_box2"><textarea name="ripple_content"></textarea></div>
                    <div class="ripple_box3"><a href="#"><img src='../img/ripple_button.png' onclick=ripple_check_input()></a></div>
                </form>
            </div>
    <?php
        }
    ?><!--댓글 끝-->
</ul>
<ul class="buttons">
    <li><button type="button" onclick="location.href='index.php?type=list&table=<?=$table?>&page=<?=$page?>'">목록보기</button></li>
    <li><button type="button" onclick="location.href='index.php?type=modify_form&table=<?=$table?>&num=<?=$num?>&page=<?=$page?>'">수정하기</button></li>
    <li><button type="button" onclick="location.href='index.php?type=delete&num=<?=$num?>&table=<?=$table?>'">삭제하기</button></li>
    <li><button type="button" onclick="location.href='index.php?type=form&table=<?=$table?>'">글쓰기</button></li>
</ul>

