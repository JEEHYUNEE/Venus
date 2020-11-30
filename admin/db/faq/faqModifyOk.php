<?php
include_once($_SERVER['DOCUMENT_ROOT']."/venus/admin/db/jhDbcon.php");
//각 변수에 write.php에서 input name값들을 저장한다
$num = $_POST['num'];
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');
if($title && $content){
    $sql = mq("update faq set content='".$content."', title='".$title."', date='".$date."' where faqNum='".$num."';"); 
    echo "<script>alert('FAQ수정이 완료되었습니다.');opener.parent.location.reload();window.close();</script>";
}else{
    echo "<script> alert('FAQ수정에 실패했습니다.');window.close();</script>";
}
?>