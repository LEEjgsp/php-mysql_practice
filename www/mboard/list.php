<ul class="board_list">
<h2 class="title"><?=$board_title?> > 목록보기</h2>
    <li>
        <span class="col1">번호</span>
        <span class="col2">제목</span>
        <span class="col3">글쓴이</span>
        <span class="col4">첨부</span>
        <span class="col5">등록일</span>
    </li>
        <?php
        if(isset($_GET["page"])){
            $page = $_GET["page"];
        }else{
            $page = 1;
        }

        include "../include/db_connect.php";

        $sql = "select * from $table order by num desc;";
        $result = mysqli_query($con,$sql);
        $total_record = mysqli_num_rows($result);
        $total_page = ceil($total_record/$scale);
        $start = ($page - 1)*$scale;

        for($i=$start; $i<$start+$scale && $i<$total_record; $i++){
            mysqli_data_seek($result,$i);
            $row = mysqli_fetch_assoc($result);
            $num = $row["num"];
            $subject = $row["subject"];
            $name = $row["name"];
            $regist_day = $row["regist_day"];
            $file_name = $row["file_name"];
            $file_copied = $row["file_copied"];
            $file_type = $row["file_type"];
            if($file_name == ""){
                $file_icon = "";
            }else{
                if($table == "_youtube"){
                    $file_icon = "<img src='../img/youtube.png' height='20'>";
                }else{
                $file_icon = "<img src='../img/file.png'>";
                }
            }
        ?>
    <li>
        <span class="col1"><?=$num?></span>
        <span class="col2">
            <a href="index.php?type=view&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>">
            <?php
                if($table == "_youtube" and $file_name){
                    echo "<img src='$file_copied' width='150'>".$subject;
                }else{
                    echo $subject;
                }
            ?>
            </a>
            <?php
                if($table == "_qna"){
                    $table_ripple = $table."_ripple";
                    $sql2 = "select * from $table_ripple where parent = '$num';";
                    $result2 = mysqli_query($con,$sql2);
                    $record_num = mysqli_num_rows($result2);

                    if($record_num){
                        echo "[$record_num]";
                    }
                }
            ?>
        </span>
        <span class="col3"><?=$name?></span>
        <span class="col4"><?=$file_icon?></span>
        <span class="col5"><?=$regist_day?></span>
    </li>
        <?php
        }
        // mysqli_close($con);
        ?>
</ul>
<ul class="page_num">
<?php

    if($page <= $total_page and $page > 1){
        $pri_page = $page - 1;
        echo "<li><a href='index.php?type=list&table=$table&page=$pri_page'> ◀ </a></li>";
    }else{
        echo "<li>&nbsp;</li>";
    }

    for($i=1; $i<=$total_page; $i++){
        if($page == $i){
            echo "<li><b> $i </b></li>";
        }else{
        echo "<li> <a href='index.php?type=list&table=$table&page=$i'>$i</a> </li>";
        }
    }

    if($page < $total_page){
        $next_page = $page + 1;
        echo "<li><a href='index.php?type=list&table=$table&page=$next_page'> ▶ </a></li>";
    }else{
        echo "<li>&nbsp;</li>";
    }

?>

</ul>
<ul class="buttons">
    <li><button type="button" onclick="location.href='index.php?type=list&table=<?=$table?>&page=1'">목록</button></li>
    <li><button type="button" onclick="location.href='index.php?type=form&table=<?=$table?>'">글쓰기</button></li>
</ul>