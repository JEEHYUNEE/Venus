<?php
include_once($_SERVER['DOCUMENT_ROOT']."/venus/admin/db/jhDbcon.php");
//각 변수에 write.php에서 input name값들을 저장한다
$idx = $_POST['idx'];
$content = $_POST['content'];
if($idx&&$content){
    $sql = mq("update faq_reply set content='".$content."'where idx='".$idx."';"); 
    echo "<script>alert('FAQ댓글수정이 완료되었습니다.');history.back();</script>";
}else{
    echo "<script> alert('FAQ댓글수정에 실패했습니다.');window.close();</script>";
}
?>