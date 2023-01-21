<div class="notice">
    <h4>공지 게시판</h4>
<?php
    include "../include/db_connect.php";

    $sql = "select * from _notice order by num desc limit 5;";
    $result = mysqli_query($con, $sql);

    while($row=mysqli_fetch_assoc($result)){
        $num = $row["num"];
        $subject = $row["subject"];
        $date = $row["regist_day"];
        $regist_day = substr($date,0,10);
?>
    <div class="item">
        <span class="col1">
            <a href="../mboard/index.php?type=view&table=_notice&num=<?=$num?>&page=1"><?=$subject?></a>
        </span>
        <span class="col2"><?=$regist_day?></span>
    </div>
<?php
    }
?>
</div>
<div class="qna">
<h4>Q&A 게시판</h4>
<?php

    $sql = "select * from _qna order by num desc limit 5;";
    $result = mysqli_query($con, $sql);

    while($row=mysqli_fetch_assoc($result)){
        $num = $row["num"];
        $subject = $row["subject"];
        $date = $row["regist_day"];
        $regist_day = substr($date,0,10);
?>
    <div class="item">
        <span class="col1">
            <a href="../mboard/index.php?type=view&table=_qna&num=<?=$num?>&page=1"><?=$subject?></a>
<?php
        $qna_rip = "select * from _qna_ripple where parent = '$num';";
        $result2 = mysqli_query($con, $qna_rip);
        $num_ripple = mysqli_num_rows($result2);
        if($num_ripple >= 1){
            echo " [$num_ripple]";
        }

?>
        </span>
        <span class="col2"><?=$regist_day?></span>
    </div>
<?php
    }
    mysqli_close($con);
?>

</div>