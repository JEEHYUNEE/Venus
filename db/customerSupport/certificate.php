<?php
include_once($_SERVER['DOCUMENT_ROOT']."/venus/db/jhDbcon.php");
//각 변수에 write.php에서 input name값들을 저장한다
$id = $_POST['id'];
$type = $_POST['type'];
$purpose = $_POST['purpose'];
$email = $_POST['email'];
$content = $_POST['content'];

$date = date('Y-m-d');
$situation='미처리';
if($id && $email && $type && $purpose && $content){
    $sql = mq("insert into certificate(userId, email, type, purpose, etc, date, situation) values('".$id."','".$email."','".$type."','".$purpose."','".$content."','".$date."','".$situation."')"); 
    echo "<script>alert('등록이 완료되었습니다.');location.href='../../customerSupport.php#certificate';</script>";
}else{
    echo "<script> alert('등록에 실패했습니다.');window.close();</script>";
}
?>