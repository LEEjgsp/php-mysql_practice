<?php

$con = mysqli_connect('localhost','user','12345','practice');
mysqli_query($con, "set session character_set_connection=utf8;");
mysqli_query($con, "set session character_set_results=utf8;");
mysqli_query($con, "set session character_set_client=utf8;");

date_default_timezone_set("Asia/Seoul");


?>