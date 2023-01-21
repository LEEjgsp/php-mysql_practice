<?php
$table = $_GET["table"];
session_start();
$userid = $_SESSION["userid"];
$username = $_SESSION["username"];
$userlevel = $_SESSION["userlevel"];
// $password = $_POST["pass"];
$subject = $_POST["subject"];
$content = $_POST["content"];
$youtube_url = $_POST["youtube_url"];
// $upfile = $_POST["upfile"];


include "../include/db_connect.php";
// 비밀번호 확인
// $sql = "select * from _mem where pass = '$password';";
// $result = mysqli_query($con,$sql);
// $record_num = mysqli_num_rows($result);

// if($record_num == 0){
//     echo "<script>
//             alert('비밀번호가 일치하지 않습니다.');
//             history.go(-1);
//             </script>";
//     exit;
// }

//데이터 삽입
$regist_day = date("Y-m-d (H:i)");

$upload_dir ="./data/"; //저장할 폴더 위치 객체화

$upfile_name = $_FILES["upfile"]["name"];
$upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
$upfile_type = $_FILES["upfile"]["type"];
$upfile_size = $_FILES["upfile"]["size"];
$upfile_error = $_FILES["upfile"]["error"];

if($upfile_name && !$upfile_error){
    $file = explode(".", $upfile_name);
    $file_name = $file[0];
    $file_ext = $file[1];

    $copied_file_name = date("Y_m_d_H_i_s");
    $copied_file_name .=".".$file_ext;
    $uploaded_file = $upload_dir.$copied_file_name;

    if($upfile_size > 10000000){
        echo "<script>
                alert('업로드 파일 크기가 지정된 용량(10MB)을 초과합니다.<br>
                        파일 크기를 체크해주세요.');
                history.go(-1)
                </script>";
        exit;
    }

    if(!move_uploaded_file($upfile_tmp_name,$uploaded_file)){
        echo "<script>
                alert('파일 업로드를 실패했습니다.');
                history.go(-1)
                </script>";
        exit;
    }
}else{ //파일업로드 오류가 안나거나 파일업로드를 안했을때
    if($table == "_youtube" && $youtube_url){
        $url = str_replace("watch?v=","embed/",$youtube_url);
        // $url = "<iframe width='560' height='315'src=$youtube_url title='YouTube video player' frameborder='0' 
        // allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' 
        // allowfullscreen></iframe>";
        $upfile_name = $youtube_url;
        $copied_file_name = str_replace("watch?v=","vi/",$youtube_url);
        $copied_file_name = str_replace("www","img",$copied_file_name);
        $copied_file_name = $copied_file_name."/default.jpg"; //썸네일 주소
        $thumbnail_file = $copied_file_name."/default.jpg"; //썸네일 주소
        $uploaded_file = $upload_dir.$thumbnail_file; //data 폴더위치 경로
        move_uploaded_file($thumbnail_file,$uploaded_file);
        $upfile_type = "youtube";

    }else{
    $upfile_name = "";
    $upfile_type = "";
    $copied_file_name = "";
    }
}

if($table == "_youtube"){
    $sql2 = "insert into $table (id, name, subject, content, url, regist_day, file_name, file_type, file_copied)";
    $sql2 .= "values ('$userid','$username','$subject','$content','$url','$regist_day','$upfile_name','$upfile_type','$copied_file_name');";
}else{
$sql2 = "insert into $table (id, name, subject, content, regist_day, file_name, file_type, file_copied)";
$sql2 .= "values ('$userid','$username','$subject','$content','$regist_day','$upfile_name','$upfile_type','$copied_file_name');";
}
mysqli_query($con,$sql2);

mysqli_close($con);

echo "<script>
        location.href='index.php?type=list&table=$table&page=1';
        </script>";

?>