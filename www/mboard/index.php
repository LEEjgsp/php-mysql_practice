<?php
    $type = $_GET["type"];
    include "../include/header.php";
    include "../include/board_setup.php"; //이 작업덕분에 따로 php파일을 만들지 않아도됨.  table값을 get방식으로 계속 전달해야함.
                                            //board_title은 한글이름을 담은 객체 ex)공지 게시판
    include $type.".php";


?>