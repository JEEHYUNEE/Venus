<?php
 include_once($_SERVER['DOCUMENT_ROOT']."/venus/admin/db/jhDbcon.php");;
//각 변수에 write.php에서 input name값들을 저장한다
$idx = $_POST['idx'];
if($idx){
    $sql = mq("delete from qna_reply where idx='".$idx."';");
    //뒤로가기 후 새로고침
    echo "<script>alert('Q&A댓글삭제가 완료되었습니다.');window.location = document.referrer;</script>";
}else{
    echo "<script>alert('Q&A댓글삭제에 실패했습니다.');window.close();</script>";
}
?>