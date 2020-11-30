<?php
include_once($_SERVER['DOCUMENT_ROOT']."/venus/db/jhDbcon.php");
//각 변수에 write.php에서 input name값들을 저장한다
$name = $_POST['name'];
$type = $_POST['type'];
$email = $_POST['email'];
$content = $_POST['content'];
$date = date('Y-m-d');
$situation='미처리';
if($name && $email && $type && $content){
    $sql = mq("insert into consult(userName, email, type, content, date, situation) values('".$name."','".$email."','".$type."','".$content."','".$date."','".$situation."')"); 
    echo "<script>alert('등록이 완료되었습니다.');location.href='../../customerSupport.php#consult';</script>";
}else{
    echo "<script> alert('등록에 실패했습니다.');window.close();</script>";
}
?>