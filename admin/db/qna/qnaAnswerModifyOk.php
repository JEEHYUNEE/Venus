<?php
 include_once($_SERVER['DOCUMENT_ROOT']."/venus/admin/db/jhDbcon.php");;
//각 변수에 write.php에서 input name값들을 저장한다
$idx = $_POST['idx'];
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');
if($title && $content){
    $sql = mq("update qna_answer set content='".$content."', title='".$title."', date='".$date."' where idx='".$idx."';"); 
    echo "<script>alert('Q&A답변수정이 완료되었습니다.');opener.parent.location.reload();window.close();</script>";
}else{
    echo "<script> alert('Q&A답변수정에 실패했습니다.');window.close();</script>";
}
?>