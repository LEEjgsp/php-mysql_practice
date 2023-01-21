<?php

    $type = $_GET["type"];
                                    // header.php를 보면 html시작 태그만 있고 끝태그는 없다. (아마 footer.php에 있을 듯)
    include "../include/header.php"; //include는 화면 출력상태도 가져오는 것이다.
    include $type.".php";

?>